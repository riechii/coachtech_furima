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
            <div class="icon">
                <div class="favorite">
                    <form class="item_detail_icon" action="/favorite" method="post">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        @if($item->favorites->where('user_id', auth()->id())->isEmpty())
                        <button class="item_favorite-btn" type="submit" value=""><i class="fa-regular fa-star" style=" font-size: 20px;"></i></button>
                        @else
                        <button class="item_favorite-btn" type="submit" value=""><i class="fa-solid fa-star" style=" font-size: 20px; color: #ff0000;"></i></button>
                        @endif
                    <p class="icon_count-favorite">{{$item->favorites->count()}}</p>
                    </form>
                </div>
                <div class="comment">
                    <a class="item_comment" href="{{ route('commentForm', $item) }}"><i class="fa-regular fa-comment" style=" font-size: 20px;"></i></a>
                    <p class="icon_count-comment">{{$item->comments->count()}}</p>
                </div>
            </div>
            <a class="item_purchase" href="{{ route('purchase', ['item_id' => $item->id]) }}">購入する</a>
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