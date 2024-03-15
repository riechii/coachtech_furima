<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationMail;
use App\Models\User;

class NotificationController extends Controller
{
    //お知らせメールフォームの表示
    public function notification()
    {
        $users = User::all();
        return view('emails.notification_form', ['users' => $users]);
    }

    //お知らせメール送信
    public function sendNotification(Request $request)
    {
        $selectedUsers = $request->input('selected_users');
        $mailContent = $request->input('notification_content');

        foreach ($selectedUsers as $userId) {
            $user = User::find($userId);
            Mail::to($user->email)->send(new NotificationMail($mailContent));
        }
        return redirect()->back()->with('message', 'お知らせメールが送信されました。');
    }
}
