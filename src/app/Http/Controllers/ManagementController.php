<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\User;

class ManagementController extends Controller
{
    //カテゴリー追加の表示
    public function uploadForm(Request $request)
    {
        return view('upload');
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
