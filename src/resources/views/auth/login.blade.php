<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>coachtechフリマ</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <header class="header">
        <div class="header_logo">
            <img src="{{ asset('storage/images/logo.svg') }}" alt="Uploaded Image">
        </div>
    </header>
    <main>
        <div class="login">
            <p class="login_ttl">ログイン</p>
            <form class="login_form" action="/login" method="post">
                @csrf
                <div class="login-input-container">
                    <p class="login_item">メールアドレス</p>
                    <input class="login-input" type="email" name="email" value="{{ old('email') }}">
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="login-input-container">
                    <p class="login_item">パスワード</p>
                    <input class="login-input" type="password" name="password">
                    <div class="form__error">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="login__btn">
                    <button class="login__btn__submit" type="submit" value="">ログインする</button>
                </div>
            </form>
            <a class="login_link" href="/register">会員登録はこちら</a>
        </div>
    </main>
</body>
</html>