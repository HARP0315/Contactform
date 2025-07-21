<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{asset('css/sanitaize.css')}}">
    <link rel="stylesheet" href="{{asset('css/thanks.css')}}">
</head>
<body>
    <main class="main"> {{-- Block: メインコンテンツ領域 (app.blade.phpのmainタグのクラスと合わせる) --}}
        <div class="thanks-page"> {{-- Block: お問い合わせ完了ページ全体 --}}
            <div class="thanks-page__inner"> {{-- Element: ページコンテンツの内側コンテナ --}}
                <div class="thanks-page__message">お問合せありがとうございました</div> {{-- Element: 完了メッセージ --}}
                <div class="thanks-page__actions"> {{-- Element: アクション（ボタンやリンク）のコンテナ --}}
                    <a class="thanks-page__home-link" href="/">HOME</a> {{-- Element: トップへ戻るリンク --}}
                </div>
            </div>
        </div>
    </main>
</body>
</html>
