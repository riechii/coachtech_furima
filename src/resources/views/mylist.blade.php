@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/mylist.css') }}" />
@endsection
@section('content')
    <div class="top_page">
        <div class="list">
            <a class="list_recommendation" href="/">おすすめ</a>
            <a class="list_mylist" href="/favorite/list">マイリスト</a>
        </div>
        @foreach($favoriteItems as $favoriteItem)
        <div class="top_page__content">
            <a href="{{ route('item', ['item_id' => $favoriteItem->id]) }}"><img class="top_page__img" src="{{ asset($favoriteItem->image) }}" alt="{{ $favoriteItem->product_name }}"></a>
        </div>
        @endforeach
    </div>
@endsection