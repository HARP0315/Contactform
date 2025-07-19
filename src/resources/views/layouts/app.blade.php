<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{asset('css/sanitaize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div>
            <div>
                <a href="">FashionablyLate</a>
                <nav>
                    <ul>
                        <li>
                            @yield('link')
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
<main>
    @yield('content')
</main>
</body>
</html>
