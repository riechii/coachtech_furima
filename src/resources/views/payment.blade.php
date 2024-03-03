<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>coachtechフリマ</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
</head>
<body>
    <div class="payment">
        <div class="payment-content">
            <span class="close">&times;</span>
            <h2>支払い方法を選択してください</h2>
            <form action="{{ route('paymentChange') }}" method="post">
                @csrf
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <label for="payment_card">
                    <input type="radio" id="payment_card" name="payment_method" value="card">
                    クレジットカード
                </label>
                <label for="payment_bank">
                    <input type="radio" id="payment_bank" name="payment_method" value="bank">
                    銀行振込
                </label>
                <label for="payment_convenience">
                    <input type="radio" id="payment_convenience" name="payment_method" value="convenience">
                    コンビニ支払い
                </label>
                <div class="paymennt__btn">
                    <button class="payment__btn__submit" type="submit" value="">更新する</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>