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
        <form class="stripe_form" action="{{ route('stripe') }}" method="post">
            @csrf
            <label for="amount">金額：</label>
            <input type="number" name="amount" id="amount" value="{{ $item->price }}" readonly required>
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{ config('stripe.publishable_key') }}"
                data-locale="auto"
                data-currency="JPY"
                data-name="お支払い画面"
                data-label="支払う"
                data-description="現在はデモ画面です"
                data-allow-remember-me="false"
                data-email="{{ auth()->user()->email }}"
                data-amount=""
                >
            </script>
        </form>
    </main>
</body>
</html>