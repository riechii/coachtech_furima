<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>coachtechフリマ</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/address.css') }}">
</head>
<body>
    <header class="header">
        <div class="header_logo"></div>
    </header>
    <main>
        <div class="address">
            <p class="address_ttl">住所変更</p>
            <form class="address_form" action="" method="">
                @csrf
                <div class="address-input_container">
                    <p class="address_item">郵便番号</p>
                    <input class="address-input" type="text" name="post" pattern="\d{3}-\d{4}" value="">
                </div>
                <div class="address-input_container">
                    <p class="address_item">住所</p>
                    <input class="address-input" type="text" name="address" value="">
                </div>
                <div class="address-input_container">
                    <p class="address_item">建物名</p>
                    <input class="address-input" type="text" name="building" value="">
                </div>
                <div class="address__btn">
                    <button class="address__btn__submit" type="submit" value="">更新する</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>