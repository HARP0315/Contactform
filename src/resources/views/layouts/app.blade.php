<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header"> {{-- Block: サイト共通のヘッダー --}}
        <div class="header__inner"> {{-- Element: ヘッダーの最大幅を制御する内側のコンテナ --}}
            <div class="header__wrap"> {{-- Element: ヘッダー内の要素の配置を制御するラップ（Flexboxコンテナ） --}}
                <div class="header__spacer-left"></div> {{-- ★追加: ロゴを中央に寄せるための左側のスペーサー★ --}}
                <a class="header__logo" href="/">FashionablyLate</a> {{-- Element: ヘッダーのロゴ --}}
                <nav class="header__nav"> {{-- Element: ヘッダーのナビゲーション --}}
                    <ul class="header-nav__list"> {{-- Element: ナビゲーションのリスト --}}
                        <li class="header-nav__item"> {{-- Element: ナビゲーションの各項目 --}}
                            @yield('link') {{-- ここにログイン/ログアウトなどのリンクが入る想定 --}}
                        </li>
                    </ul>
                </nav>
                <div class="header__spacer-right"></div> {{-- ★追加: ナビを右端に寄せるための右側のスペーサー★ --}}
            </div>
        </div>
    </header>
<main class="main"> {{-- Block: メインコンテンツ領域 --}}
    @yield('content')
</main>
</body>
</html>
