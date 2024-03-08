<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>coachtechフリマ</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
</head>
<body>
    <header class="header">
        <div class="header_logo"></div>
    </header>
    <main>
        <div class="sell">
            <p class="sell_ttl">商品の出品</p>
            <form class="sell_form" action="/sell/listing" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="sell-input_container">
                    <p class="sell_item">商品画像</p>
                    <div class="sell_image">
                        <label for="image" title="画像を選択する">
                            <input class="image_input" type="file" id="image" name="image" >
                            <span class="image_item">画像を選択する</span>
                        </label>
                    </div>
                </div>
                <div class="form__error">
                    @error('image')
                    {{ $message }}
                    @enderror
                </div>
                <div class="sell-input_container">
                    <div class="sell_index">商品の詳細</div>
                    <p class="sell_item">カテゴリー</p>
                    <select class="sell-input" name="category" id="">
                        <option value=""selected disabled>カテゴリーを選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__error">
                    @error('category')
                    {{ $message }}
                    @enderror
                </div>
                <div class="sell-input_container">
                    <p class="sell_item">商品の状態</p>
                    <input class="sell-input" type="text" name="situation" value="{{ old('situation') }}">
                </div>
                <div class="form__error">
                    @error('situation')
                    {{ $message }}
                    @enderror
                </div>
                <div class="sell-input_container">
                    <p class="sell_item">ブランド名</p>
                    <input class="sell-input" type="text" name="brand" value="{{ old('brand') }}">
                </div>
                <div class="sell-input_container">
                    <div class="sell_index">商品名と説明</div>
                    <p class="sell_item">商品名</p>
                    <input class="sell-input" type="text" name="product_name" value="{{ old('product_name') }}">
                </div>
                <div class="form__error">
                    @error('product_name')
                    {{ $message }}
                    @enderror
                </div>
                <div class="sell-input_container">
                    <p class="sell_item">商品の説明</p>
                    <textarea class="sell-input_text" name="explanation">{{ old('explanation') }}</textarea>
                </div>
                <div class="form__error">
                    @error('explanation')
                    {{ $message }}
                    @enderror
                </div>
                <div class="sell-input_container">
                    <div class="sell_index">販売価格</div>
                    <p class="sell_item">販売価格</p>
                    <input class="sell-input" type="text" name="price" value="{{ old('price') }}">
                </div>
                <div class="form__error">
                    @error('price')
                    {{ $message }}
                    @enderror
                </div>
                <div class="sell__btn">
                    <button class="sell__btn__submit" type="submit" value="">出品する</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>