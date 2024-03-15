@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/notification_form.css') }}" />
@endsection
@section('content')
    @if(session('message'))
        <div class="message">
            {{ session('message') }}
        </div>
    @endif
    <div class="user_list">
        <p class="user_list_ttl">管理画面</p>
        <div class="list">
            <a class="list_mail" href="/notification">お知らせメール</a>
            <a class="list_delete" href="/user">ユーザー削除</a>
        </div>
        <form action="{{ route('sendNotification')}}" method="post">
            @csrf
            <table class="user_list_table">
                <tr class="list_row_wrp">
                    <th class="list_row">複数選択可</th>
                    <th class="list_row">名前</th>
                    <th class="list_row">メールアドレス</th>
                </tr>
                @foreach($users as $user)
                <tr class="list_row_wrp">
                    <td class="list_row"><input type="checkbox" name="selected_users[]" value="{{ $user->id }}"></td>
                    <td class="list_row">{{ $user->name}}</td>
                    <td class="list_row">{{ $user->email}}</td>
                </tr>
                @endforeach
            </table>
            <textarea class="notification_text" id="notification_content" name="notification_content" rows="4" cols="50"></textarea>
            <div class="notification__btn">
                <button class="notification__btn__submit" type="submit" value="">送信する</button>
            </div>
        </form>
    </div>
@endsection