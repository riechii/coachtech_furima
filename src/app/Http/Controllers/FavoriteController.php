<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    //お気に入り登録、削除
    public function favorite(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $item_id = $request->input('item_id');
        $user_id = auth()->id();

        $favorited = Favorite::where('user_id', $user_id)->where('item_id', $item_id)->first();

        if($favorited){
            $favorited->delete();
        }else{
            $favorite = new Favorite();
            $favorite->user_id = $user_id;
            $favorite->item_id = $item_id;
            $favorite->save();
        }
        return redirect()->back();
    }

    //マイリストの表示
    public function favoriteList(Request $request)
    {
        if (auth()->check()) {
        $favoriteItemIds = auth()->user()->favorites()->pluck('item_id');
        $favoriteItems = Item::whereIn('id', $favoriteItemIds)->get();

        return view('mylist', ['favoriteItems' => $favoriteItems]);
        }else{
            return redirect('/login');
        }
    }
}
