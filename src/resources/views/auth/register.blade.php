<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>coachtechフリマ</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <header class="header">
        <div class="header_logo">
            <img src="{{ asset('storage/images/logo.svg') }}" alt="Uploaded Image">
        </div>
    </header>
    <main>
        <div class="register">
            <p class="register_ttl">会員登録</p>
            <form action="/register" method="post">
                @csrf
                <div class="register-input-container">
                    <p class="register_item">メールアドレス</p>
                    <input class="register-input" type="email" name="email" value="{{ old('email') }}">
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="register-input-container">
                    <p class="register_item">パスワード</p>
                    <input class="register-input" type="password" name="password">
                    <div class="form__error">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="register__btn">
                    <button class="register__btn__submit" type="submit" value="">登録する</button>
                </div>
            </form>
            <a class="register_link" href="/login">ログインはこちら</a>
        </div>
    </main>
</body>
</html>