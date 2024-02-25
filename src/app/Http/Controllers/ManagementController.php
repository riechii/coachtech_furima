<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

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
}
