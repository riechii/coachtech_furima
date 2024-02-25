@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/purchse_list.css') }}" />
@endsection
@section('content')
    <div class="purchse_list">
        <div class="user">
            <img class="user_img" src="" alt="">
            <p class="user_name">ユーザー名</p>
            <a class="edit_profile" href="">プロフィールを編集</a>
        </div>
        <div class="list">
            <a class="xhibition_list" href="">出品した商品</a>
            <a class="purchase_list" href="">購入した商品</a>
        </div>
        <div class="purchse_list__content">
            <a href=""><img class="purchse_list__img" src="" alt=""></a>
        </div>
    </div>
@endsection