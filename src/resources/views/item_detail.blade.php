@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/item_detail.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
@section('content')
    <div class="detail">
        <div class="detail_image">
            <img class="detail_image_img" src="{{ asset($item->image) }}" alt="">
        </div>
        <div class="item_detail">
            <h3 class="product_name">{{ $item->product_name }}</h3>
            <p class="brand_name">{{ $item->brand }}</p>
            <p class="price">¥{{number_format($item->price)}}(値段)</p>
            <div class="item_detail_icon">
                <button class="item_favorite-btn" type="submit" value=""><i class="fa-regular fa-star" style=" font-size: 20px;"></i></button>
                <a class="item_comment" href="{{ route('commentForm', $item) }}"><i class="fa-regular fa-comment" style=" font-size: 20px;"></i></a>
            </div>
            <div class="icon_count">
                <p class="icon_count-favorite">数字</p>
                <p class="icon_count-comment">{{$item->comments->count()}}</p>
            </div>
            <a class="item_purchase" href="">購入する</a>
            <h4 class="item_detail_ttl">商品説明</h4>
            <p class="explanation">{{ $item->explanation }}</p>
            <h4 class="item_detail_ttl">商品の情報</h4>
            <div class="item_detail_information">
                <p class="category">カテゴリー</p>
                <div class="category_detail">{{ $category->category}}</div>
            </div>
            <div class="item_detail_information">
                <p class="category">商品の状態</p>
                <p class="category_situation">{{ $item->situation }}</p>
            </div>
        </div>
    </div>
@endsection