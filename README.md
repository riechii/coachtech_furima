# coachtechフリマ
フリマアプリです。会員登録することで商品の出品、購入、お気に入り登録、コメントができます。
![oachtech_furima_top](https://github.com/riechii/coachtech_furima/blob/main/oachtech_furima_top.png)

## 作成した目的
laravel学習のために作成しました。成果物の機能やイメージをいただきそれに沿って作成しました。
## 機能一覧
・会員登録機能(名前、メールアドレス、パスワード)

・ログイン(メールアドレス、パスワードで認証)

・ログアウト

・商品一覧ページ（おすすめ、マイリスト）

・マイページ（出品した商品、購入した商品）

・プロフィールの設定、住所の変更

・出品

・お気に入り登録、削除

・コメント投稿、削除

・支払い方法の選択、変更(カードの時のみStripeを利用して決済をすることができます)

・管理者による管理画面(お知らせメールの送信、ユーザーの削除、カテゴリーの追加)

## 使用技術(実行環境)
・laravel 8.83.8

・mysql 8.0.26

・PHP 8.0.30

## テーブル設計
![coachtech_furima_table](https://github.com/riechii/coachtech_furima/blob/main/coachtech_furima_table.png)
## ER図
![oachtech_furima_er](https://github.com/riechii/coachtech_furima/blob/main/oachtech_furima_er.png)
## 環境構築
1 laravelプロジェクトを実行したいディレクトリに移動

2 $ git clone git@github.com:riechii/coachtech_furima.git

3 $ docker-compose up -d --build

4 Dockerのコンテナに入る $ docker-compose exec php bash

5 composerをインストール $ composer install

6 PHPUnitのインストール $ composer require --dev phpunit/phpunit

7 Stripe PHPライブラリをインストールする $ composer require stripe/stripe-php

8 .evnの作成 $ cp .env.example .env

9 APP_KEYを作成 $ php artisan key:generate

10 .envの設定を変える

DB_HOST=DBコンテナのサービス名、 DB_DATABASE、DB_USERNAME、DB_PASSWORD、docker-compose.ymlで作成したデータベース名、ユーザ名、パスワードを記述

STRIPE_KEYとSTRIPE_SECRETも記述

メールのSMTPサーバーの設定も行う

11 画像をストレージに保存するためのシンボリックリンクの作成 $ php artisan storage:link

12 テーブル作成 $ php artisan migrate

13 ダミーデータの作成 $ php artisan db:seed

localhost:80（Nginxコンテナのポートを80にした場合）にアクセスすると表示されます。
