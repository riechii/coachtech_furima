@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/comment.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
@section('content')
    @if(session('message'))
        <div class="message">
            {{ session('message') }}
        </div>
    @endif
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
                <a class="item_comment" href=""><i class="fa-regular fa-comment" style=" font-size: 20px;"></i></a>
            </div>
            <div class="icon_count">
                <p class="icon_count-favorite">数字</p>
                <p class="icon_count-comment">{{$item->comments->count()}}</p>
            </div>
            @foreach($comments as $comment)
            <div class="comment">
                @if($comment->user_id == auth()->id())
                    <div class="my_comment_name">{{ $comment->user->name }}</div>
                    <img class="my_comment_img" src="/{{ $comment->user->image }}" alt="">
                @else
                    <img class="comment_img" src="/{{ $comment->user->image }}" alt="">
                    <div class="comment_name">{{ $comment->user->name }}</div>
                @endif
            </div>
            <div class="comment_text">{{ $comment->comment }}</div>
            @endforeach
            <form class="comment_form" action="/comment" method="post">
                @csrf
                <p class="comment_item">商品へのコメント</p>
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <textarea class="comment_input" name="comment"></textarea>
                <div class="comment__btn">
                    <button class="comment__btn__submit" type="submit" value="">コメントを送信する</button>
                </div>
            </form>
        </div>
    </div>
@endsection