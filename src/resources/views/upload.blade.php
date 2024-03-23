@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/upload.css') }}" />
@endsection
@section('content')
    @if(session('message'))
        <div class="message">
            {{ session('message') }}
        </div>
    @endif
    <div class="category">
        <p class="category_ttl">管理画面</p>
        <div class="list">
            <a class="list_mail" href="/notification">お知らせメール</a>
            <a class="list_delete" href="/user">ユーザー削除</a>
            <a class="list_category" href="/upload/form">カテゴリー追加</a>
        </div>
        <div class="category_content">
            <p class="category_name">カテゴリー</p>
            <form action="/upload/category" method="POST">
                @csrf
                <input class="category_input" type="text" name="category">
                <button class="submit" type="submit">追加</button>
            </form>
        </div>
    </div>
@endsection