<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Item;
use App\Models\Purchase;
use App\Http\Requests\ListingRequest;

class ItemController extends Controller
{
    //トップページの表示
    public function index()
    {
        $purchasedItemIds = Purchase::pluck('item_id')->toArray();
        $items = Item::whereNotIn('id', $purchasedItemIds)->get();

        return view('top_page', compact('items'));
    }

    //出品ページの表示
    public function sell(Request $request)
    {
        $categories = Category::all();

        return view('sell', compact('categories'));
    }

    //出品処理
    public function listing(ListingRequest $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
            $item = new Item();
            $item->user_id = auth()->id();
            $item->category_id = $request->input('category');
            $item->situation = $request->input('situation');
            $item->product_name = $request->input('product_name');
            $item->brand = $request->input('brand');
            $item->explanation = $request->input('explanation');
            $item->price = $request->input('price');

            $uploadedFile = $request->file('image');
            $original = $uploadedFile->getClientOriginalName();
            $time = now()->format('Ymd_Hi');
            $fileName = $time . '_' . $original;
            $uploadedFile->storeAs('public/images', $fileName);

            $item->image = 'storage/images/' . $fileName;
            $item->save();

        return redirect('/')->with('message', '出品されました');
    }

    //商品詳細ページの表示
    public function item($item_id)
    {
        $item = Item::find($item_id);
        $category = Category::find($item->category_id);

        return view('item_detail', ['item' => $item, 'category' => $category]);
    }

    //検索
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $purchasedItemIds = Purchase::pluck('item_id')->toArray();

        $items = Item::whereNotIn('id', $purchasedItemIds)->where(function($query) use ($keyword) {
            $query->where('product_name', 'like', "%$keyword%")->orWhere('explanation', 'like', "%$keyword%");
        })->get();

        return view('top_page', ['items' => $items]);
    }
}
