<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Item;
use App\Models\Purchase;
use App\Http\Requests\ProfileRequest;


class MypageController extends Controller
{
    //マイページの表示
    public function mypage()
    {
        $user = auth()->user();
        $userId = auth()->id();
        $items = Item::where('user_id', $userId)->get();

        return view('mypage', ['user' => $user,'items' => $items]);
    }

    //プロフィール設定画面の表示
    public function profile()
    {
        $user = auth()->user();

        return view('profile', ['user' => $user]);
    }

    //プロフィール設定
    public function profileUpdate(ProfileRequest $request, $id)
    {
        $user = User::find($id);

        $data = [
            'name' => $request->name,
            'post' => $request->post,
            'address' => $request->address,
            'building' => $request->building,
        ];

        if ($request->hasFile('image')){
            $original = $request->file('image')->getClientOriginalName();
            $time = now()->format('Ymd_Hi');
            $fileName = $time . '_' . $original;
            $request->file('image')->storeAs('public/images', $fileName);
            $data['image'] = 'storage/images/' . $fileName;
        }
        $user->update($data);

        return redirect()->route('mypage', ['id' => $id])->with('message', 'プロフィールを変更しました。');
    }

    //購入した商品の表示
    public function purchaseList()
    {
        $user = auth()->user();
        $userId = auth()->id();
        $purchases = Purchase::where('user_id', $userId)->get();

        return view('purchase_list', ['user' => $user,'purchases' => $purchases]);
    }
}
