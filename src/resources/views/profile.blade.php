@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
@endsection
@section('content')
    <div class="address">
        <p class="address_ttl">プロフィール設定</p>
        <form class="address_form" action="{{ route('profileUpdate', ['id' => Auth::id()]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="profile_image">
                <img class="current_image" src="{{asset($user->image)}}" alt="">
                <label for="image" title="画像を選択する">
                    <input class="image_input" type="file" id="image" name="image" >
                    <span class="image_item">画像を選択する</span>
                </label>
            </div>
            <div class="form__error">
                @error('image')
                {{ $message }}
                @enderror
            </div>
            <div class="address-input_container">
                <p class="address_item">ユーザー名</p>
                <input class="address-input_user" type="text" name="name" value="{{ $user->name }}">
            </div>
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div class="address-input_container">
                <p class="address_item">郵便番号</p>
                <input class="address-input" type="text" name="post" pattern="\d{3}-\d{4}" value="{{ $user->post }}">
            </div>
            <div class="form__error">
                @error('post')
                {{ $message }}
                @enderror
            </div>
            <div class="address-input_container">
                <p class="address_item">住所</p>
                <input class="address-input" type="text" name="address" value="{{ $user->address }}">
            </div>
            <div class="form__error">
                @error('address')
                {{ $message }}
                @enderror
            </div>
            <div class="address-input_container">
                <p class="address_item">建物名</p>
                <input class="address-input" type="text" name="building" value="{{ $user->building }}">
            </div>
            <div class="address__btn">
                <button class="address__btn__submit" type="submit" value="">更新する</button>
            </div>
        </form>
    </div>
@endsection