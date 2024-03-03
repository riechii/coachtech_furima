@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase_list.css') }}" />
@endsection
@section('content')
    <div class="purchse_list">
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
        <div class="purchse_list__content">
            @foreach($purchases as $purchase)
            <a href="{{ route('item', ['item_id' => $purchase->item->id]) }}"><img class="purchse_list__img" src="{{asset($purchase->item->image)}}" alt="{{$purchase->item->product_name}}"></a>
            @endforeach
        </div>
    </div>
@endsection