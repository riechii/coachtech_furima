@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/top_page.css') }}" />
@endsection
@section('content')
    @if(session('message'))
        <div class="message">
            {{ session('message') }}
        </div>
    @endif
    <div class="top_page">
        <div class="list">
            <a class="list_recommendation" href="/">おすすめ</a>
            <a class="list_mylist" href="/favorite/list">マイリスト</a>
        </div>
        @foreach($items as $item)
        <div class="top_page__content">
            <a href="{{ route('item', $item) }}"><img class="top_page__img" src="{{ asset($item->image) }}" alt="{{ $item->product_name }}"></a>
        </div>
        @endforeach
    </div>
@endsection