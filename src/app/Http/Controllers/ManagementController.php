<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\User;

class ManagementController extends Controller
{
    //アップロードフォームの表示
    public function uploadForm(Request $request)
    {
        return view('upload');
    }

    //画像のアップロード
    public function upload(Request $request)
    {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        Storage::disk('public')->putFileAs('images', $image, $imageName);

        return redirect('/upload/form');
    }

    //カテゴリー追加
    public function uploadCategory(Request $request)
    {
        $category = $request->only(['category']);
        Category::create($category);

        return redirect('/upload/form')->with('message', 'カテゴリーを追加しました');
    }

    //ユーザー削除ページの表示
    public function user()
    {
        $users = User::all();
        return view('user_delete', ['users' => $users]);
    }

    //ユーザーの削除
    public function userDelete($user_id)
    {
        User::find($user_id)->delete();

        return redirect()->back()->with('message', 'ユーザーが削除されました。');
    }
}
