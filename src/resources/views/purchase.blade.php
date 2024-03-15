@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}" />
@endsection
@section('content')
    <div class="purchase">
        <div class="purchase-goods">
            <div class="goods-detail">
                <img class="purchase_img" src="{{ asset($item->image) }}" alt="{{ $item->product_name }}">
                <div class="purchase_item">
                    <p class="purchase_name">{{ $item->product_name }}</p>
                    <p class="purchase_price">¥{{number_format($item->price)}}</p>
                </div>
            </div>
            <div class="purchase_content">
                <p class="purchase_content_item">支払い方法</p>
                <a class="purchase_content_link" href="{{ route('payment', ['item_id' => $item->id]) }}">変更する</a>
            </div>
            @if(session('message'))
                <div class="message">
                    {{ session('message') }}
                </div>
            @endif
            <div class="purchase_content">
                <p class="purchase_content_item">配送先　　</p>
                <a class="purchase_content_link" href="{{ route('address', ['item_id' => $item->id]) }}">変更する</a>
            </div>
        </div>
        <div class="purchase-confirmation">
            <div class="confirmation_content">
                <div class="confirmation_content_detail">
                    <p class="confirmation_content_detail_item">商品代金　</p>
                    <p class="confirmation_content_detail_price">¥{{number_format($item->price)}}</p>
                </div>
                <div class="confirmation_content_detail_payment">
                    <p class="confirmation_content_detail_item_payment">支払い金額</p>
                    <p class="confirmation_content_detail_price_payment">¥{{number_format($item->price)}}</p>
                </div>
                <div class="confirmation_content_detail_payment">
                    <p class="confirmation_content_detail_item_payment">支払い方法</p>
                    <p class="confirmation_content_detail_price_payment">{{ session('payment_method') }}</p>
                </div>
            </div>
            <div class="form__error">
                @error('payment')
                {{ $message }}
                @enderror
            </div>
            <form action="{{ route('buy') }}" method="post">
                @csrf
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <input type="hidden" name="payment" value="{{ session('payment_method') }}">
                <div class="purchase__btn">
                    <button class="purchase__btn__submit" type="submit" value="">購入する</button>
                </div>
            </form>
        </div>
    </div>
@endsection