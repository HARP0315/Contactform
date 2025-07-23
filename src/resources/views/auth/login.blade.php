@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('link')
<a class="header-nav__button" href="/register">register</a> {{-- Element: ヘッダーナビゲーションのリンク --}}
@endsection

@section('content')
<div class="auth-page"> {{-- Block: 認証ページ全体 --}}
    <div class="auth-page__inner"> {{-- Element: ページコンテンツの内側コンテナ --}}
        <div class="auth-page__header"> {{-- Element: ページのヘッダー部分（タイトル含む） --}}
            <h2 class="auth-page__title">Login</h2> {{-- Element: ページのタイトル --}}
        </div>
        <div class="auth-page__content"> {{-- Element: 認証フォームのコンテンツコンテナ --}}
            <form class="auth-form" action="/login" method="post"> {{-- Block: 認証フォーム --}}
                @csrf
                <div class="auth-form__group"> {{-- Element: 各入力グループ --}}
                    <p class="auth-form__label-text">メールアドレス</p> {{-- Element: ラベルテキスト --}}
                    <input class="auth-form__input-field" type="email" name="email" value="{{old('email')}}"> {{-- Element: 入力フィールド --}}
                </div>
                <div class="auth-form__error-area"> {{-- Element: エラーメッセージ表示エリア --}}
                    @error('email') <p class="auth-form__error-text">{{ $message }}</p> @enderror {{-- Element: エラーテキスト --}}
                </div>
                <div class="auth-form__group">
                    <p class="auth-form__label-text">パスワード</p>
                    <input class="auth-form__input-field" type="password" name="password" id="password">
                </div>
                <div class="auth-form__error-area">
                    @error('password') <p class="auth-form__error-text">{{ $message }}</p> @enderror
                </div>
                <div class="auth-form__actions"> {{-- Element: フォームのボタン群 --}}
                    <button type="submit" class="auth-form__button">ログイン</button> {{-- Element: ログインボタン --}}
                </div>
            </form>

        </div> {{-- / .auth-page__content --}}
    </div> {{-- / .auth-page__inner --}}
</div> {{-- / .auth-page --}}
@endsection
