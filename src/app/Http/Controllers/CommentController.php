<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //コメントページの表示
    public function commentForm($item_id)
    {
        $item = Item::find($item_id);
        $comments = Comment::where('item_id', $item_id)->get();

        $userIds = $comments->pluck('user_id');
        $users = User::whereIn('id', $userIds)->get();

        return view('comment', ['item' => $item,'comments'=> $comments,'users'=> $users]);
    }

    //コメントの投稿
    public function comment(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        if (!$user->name){
            return redirect('/mypage/profile');
        }

        $item_id = $request->input('item_id');

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->item_id = $item_id;
        $comment->comment = $request->input('comment');
        $comment->save();

        return redirect()->route('commentForm', ['item_id' => $item_id])->with('message', 'コメントを投稿しました。');
    }

}
