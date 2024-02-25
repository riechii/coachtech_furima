@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/top_page.css') }}" />
@endsection
@section('content')
    <div class="top_page">
        <div class="list">
            <a class="list_recommendation" href="/">おすすめ</a>
            <a class="list_mylist" href="">マイリスト</a>
        </div>
        <div class="top_page__content">
            <a href=""><img class="top_page__img" src="" alt=""></a>
        </div>
    </div>
@endsection