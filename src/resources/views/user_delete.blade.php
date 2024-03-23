@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/user_delete.css') }}" />
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
            <a class="list_category" href="/upload/form">カテゴリー追加</a>
        </div>
        <table class="user_list_table">
            <tr class="list_row_wrp">
                <th class="list_row">名前</th>
                <th class="list_row">メールアドレス</th>
                <th class="list_row">削除</th>
            </tr>
            @foreach($users as $user)
            <tr class="list_row_wrp">
                <td class="list_row">{{ $user->name}}</td>
                <td class="list_row">{{ $user->email}}</td>
                <td class="list_row">
                    <form action="{{ route('userDelete', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="delete__btn">
                            <button class="delete__btn__submit" type="submit" value="">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection