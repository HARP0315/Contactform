# アプリケーション名
お問い合わせフォーム

## 環境構築
### Dockerビルド

1. git clone リンク
2. docker-compose up -d -build

* MySQLはOSによって起動しない可能性がありますので、使用されるOSに合わせ下記ファイルをご調整ください
  * docker-compose.yml

### Laravel環境構築

1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

## 使用技術(実行環境)

* PHP 8.3
* Laravel 8.83
* MySQL 8.4.0
* nginx 1.28.0

## ER図
< - - - 作成したER図の画像 - - - >

## URL
* 開発環境： http://localhost/
* phpMyAdmin： http://localhost:8080/
