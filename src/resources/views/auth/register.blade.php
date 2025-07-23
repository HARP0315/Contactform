@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('link')
<a class="header-nav__button" href="/login">login</a> {{-- ヘッダーナビゲーションのリンク --}}
@endsection

@section('content')
<div class="auth-page"> {{-- ブロック: 認証ページ全体 --}}
    <div class="auth-page__inner"> {{-- 要素: ページコンテンツの内側コンテナ --}}
        <div class="auth-page__header"> {{-- 要素: ページのヘッダー部分（タイトル含む） --}}
            <h2 class="auth-page__title">Register</h2> {{-- 要素: ページのタイトル --}}
        </div>
        <div class="auth-page__content"> {{-- 要素: 認証フォームのコンテンツコンテナ --}}
            <form class="auth-form" action="/register" method="post"> {{-- ブロック: 認証フォーム --}}
                @csrf
                <div class="auth-form__group"> {{-- 要素: 各入力グループ --}}
                    <label class="auth-form__label" for="name">お名前</label> {{-- ラベル --}}
                    <input class="auth-form__input-field" type="text" name="name" id="name" value="{{ old('name') }}"> {{-- 入力フィールド --}}
                    <div class="auth-form__error-area"> {{-- エラーメッセージ表示エリア --}}
                        @error('name') <p class="auth-form__error-text">{{ $message }}</p> @enderror {{-- エラーテキスト --}}
                    </div>
                </div>

                <div class="auth-form__group">
                    <label class="auth-form__label" for="email">メールアドレス</label>
                    <input class="auth-form__input-field" type="email" name="email" id="email" value="{{ old('email') }}">
                    <div class="auth-form__error-area">
                        @error('email') <p class="auth-form__error-text">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="auth-form__group">
                    <label class="auth-form__label" for="password">パスワード</label>
                    <input class="auth-form__input-field" type="password" name="password" id="password">
                    <div class="auth-form__error-area">
                        @error('password') <p class="auth-form__error-text">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- パスワード確認フィールドも通常ここに追加します (課題要件による) --}}
                {{-- <div class="auth-form__group">
                    <label class="auth-form__label" for="password_confirmation">パスワード（確認）</label>
                    <input class="auth-form__input-field" type="password" name="password_confirmation" id="password_confirmation">
                    <div class="auth-form__error-area">
                        @error('password_confirmation') <p class="auth-form__error-text">{{ $message }}</p> @enderror
                    </div>
                </div> --}}

                <div class="auth-form__actions"> {{-- フォームのボタン群 --}}
                    <button type="submit" class="auth-form__button">登録</button> {{-- 登録ボタン --}}
                </div>
            </form>
        </div> {{-- / .auth-page__content --}}
    </div> {{-- / .auth-page__inner --}}
</div> {{-- / .auth-page --}}
@endsection
