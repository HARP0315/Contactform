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
<img width="491" height="391" alt="ER図" src="https://github.com/user-attachments/assets/74f9d754-3210-4d7d-b915-83bd254f9e9f" />
<img width="181" height="211" alt="users" src="https://github.com/user-attachments/assets/abf14779-12fa-4321-a1bf-2900cfa76bea" />

## URL
* 開発環境： http://localhost/
* phpMyAdmin： http://localhost:8080/
