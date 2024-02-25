@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}" />
@endsection
@section('content')
    <div class="purchase">
        <div class="purchase-goods">
            <div class="goods-detail">
                <img class="purchase_img" src="" alt="">
                <div class="purchase_item">
                    <p class="purchase_name">商品名</p>
                    <p class="purchase_price">¥値段</p>
                </div>
            </div>
            <div class="purchase_content">
                <p class="purchase_content_item">支払い方法</p>
                <a class="purchase_content_link" href="">変更する</a>
            </div>
            <div class="purchase_content">
                <p class="purchase_content_item">配送先　　</p>
                <a class="purchase_content_link" href="">変更する</a>
            </div>
        </div>
        <div class="purchase-confirmation">
            <div class="confirmation_content">
                <div class="confirmation_content_detail">
                    <p class="confirmation_content_detail_item">商品代金　</p>
                    <p class="confirmation_content_detail_price">¥金額</p>
                </div>
                <div class="confirmation_content_detail_payment">
                    <p class="confirmation_content_detail_item_payment">支払い金額</p>
                    <p class="confirmation_content_detail_price_payment">¥金額</p>
                </div>
                <div class="confirmation_content_detail_payment">
                    <p class="confirmation_content_detail_item_payment">支払い方法</p>
                    <p class="confirmation_content_detail_price_payment">方法</p>
                </div>
            </div>
            <div class="purchase__btn">
                <button class="purchase__btn__submit" type="submit" value="">購入する</button>
            </div>
        </div>
    </div>
@endsection