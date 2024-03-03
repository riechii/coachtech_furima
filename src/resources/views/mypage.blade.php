@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
@endsection
@section('content')
    <div class="mypage">
        @if(session('message'))
            <div class="message">
                {{ session('message') }}
            </div>
        @endif
        <div class="user">
            <img class="user_img" src="{{asset($user->image)}}" alt="">
            <p class="user_name">{{ $user->name}}</p>
            <a class="edit_profile" href="/mypage/profile">プロフィールを編集</a>
        </div>
        <div class="list">
            <a class="xhibition_list" href="/mypage">出品した商品</a>
            <a class="purchase_list" href="/purchase/list">購入した商品</a>
        </div>
        <div class="mypage__content">
            @foreach($items as $item)
            <a href="{{ route('item', ['item_id' => $item->id]) }}"><img class="mypage__img" src="{{asset($item->image)}}" alt="{{$item->product_name}}"></a>
            @endforeach
        </div>
    </div>
@endsection