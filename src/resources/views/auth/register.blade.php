@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('link')
<a href="/login">login</a>
@endsection

@section('content')
<div>
    <div>
        <div>
            <h2>Register</h2>
        </div>
        <form class="" action="/register" method="post">
            @csrf
            <div>
                <label for="name">お名前</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
                <div>
                    @error('name') {{-- name のエラーメッセージ表示 --}}
                        {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div>
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
                <div>
                    @error('email') {{-- email のエラーメッセージ表示 --}}
                        {{ $message }}
                @enderror
                </div>
            </div>
            <div>
                <label for="password">パスワード</label>
                <input type="password" name="password" id="password">
                <div>
                    @error('password') {{-- password のエラーメッセージ表示 --}}
                        {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div>
                <label for="password_confirmation">パスワード（確認）</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
                <div>
                    @error('password_confirmation') {{-- password_confirmation のエラーメッセージ表示 --}}
                    {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div>
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection
