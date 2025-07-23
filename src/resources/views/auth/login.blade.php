@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('link')
<a class="header-nav__button" href="/register">register</a>
@endsection

@section('content')
<div class="auth-page">
    <div class="auth-page__inner">
        <div class="auth-page__header">
            <h2 class="auth-page__title">Login</h2>
        </div>
        <div class="auth-page__content">
            <form class="auth-form" action="/login" method="post">
                @csrf
                <div class="auth-form__group">
                    <p class="auth-form__label-text">メールアドレス</p>
                    <input class="auth-form__input-field" type="email" name="email"
                    value="{{old('email')}}" placeholder="例:test@example.com">
                </div>
                <div class="auth-form__error-area">
                    @error('email') <p class="auth-form__error-text">{{ $message }}</p> @enderror
                </div>
                <div class="auth-form__group">
                    <p class="auth-form__label-text">パスワード</p>
                    <input class="auth-form__input-field" type="password" name="password"
                    placeholder="例:coachtech1106">
                </div>
                <div class="auth-form__error-area">
                    @error('password') <p class="auth-form__error-text">{{ $message }}</p> @enderror
                </div>
                <div class="auth-form__actions">
                    <button type="submit" class="auth-form__button">ログイン</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
