@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/upload.css') }}" />
@endsection
@section('content')
@if(session('message'))
    <div class="upload-message">
    {{ session('message') }}
    </div>
@endif
<form action="/upload" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button type="submit">Upload</button>
</form>
<div>カテゴリー</div>
<form action="/upload/category" method="POST">
    @csrf
    <input type="text" name="category">
    <button type="submit">追加</button>
</form>

<img src="{{ asset('storage/images/logo.svg') }}" alt="Uploaded Image">
@endsection