@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('link')
<a class="header-nav__button" href="/login">login</a>
@endsection

@section('content')
<div class="auth-page">
    <div class="auth-page__inner">
        <div class="auth-page__header">
            <h2 class="auth-page__title">Register</h2>
        </div>
        <div class="auth-page__content">
            {{-- 登録フォーム --}}
            <form class="auth-form" action="/register" method="post">
                @csrf
                <div class="auth-form__group">
                    <p class="auth-form__label-text">お名前</p>
                    <input class="auth-form__input-field" type="text" name="name"
                    value="{{ old('name') }}" placeholder="例:山田&emsp;太郎">
                    <div class="auth-form__error-area">
                        @error('name') <p class="auth-form__error-text">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="auth-form__group">
                    <p class="auth-form__label-text">メールアドレス</p>
                    <input class="auth-form__input-field" type="email" name="email"
                    value="{{ old('email') }}" placeholder="例:test@example.com">
                    <div class="auth-form__error-area">
                        @error('email') <p class="auth-form__error-text">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="auth-form__group">
                    <p class="auth-form__label-text">パスワード</p>
                    <input class="auth-form__input-field" type="password" name="password"
                    placeholder="例:coachtech1106">
                    <div class="auth-form__error-area">
                        @error('password') <p class="auth-form__error-text">{{ $message }}</p> @enderror
                    </div>
                </div>
                {{-- 登録ボタン --}}
                <div class="auth-form__actions">
                    <button type="submit" class="auth-form__button">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
