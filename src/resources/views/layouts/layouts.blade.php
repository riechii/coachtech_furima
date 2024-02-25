<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>coachtechフリマ</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="seach">
            <img class="icon" src="{{ asset('storage/images/logo.svg') }}" alt="Uploaded Image">
            <form class="seach_content">
                @csrf
                <input class="seach_input" type="text" name="search" placeholder="何をお探しですか？">
                <button class="search__btn" type="submit" value="">検索</button>
            </form>
            @if(Auth::check())
            <nav class="seach_nav">
                <form class="seach_form" action="/logout" method="post">
                    @csrf
                    <button class="seach_logaut">ログアウト</button>
                </form>
                <a class="seach_link" href="/mypage">マイページ</a>
                <a class="seach_link_listing" href="/sell">出品</a>
            </nav>
            @else
            <nav class="seach_nav">
                <a class="seach_link" href="/login">ログイン</a>
                <a class="seach_link" href="/register">会員登録</a>
                <a class="seach_link_listing" href="/sell">出品</a>
            </nav>
            @endif
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>