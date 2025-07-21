@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('link')
<a href="/register">register</a>
@endsection

@section('content')
<div>
    <div>
        <div>
            <h2>Login</h2>
        </div>
        <form class="" action="/login" method="post">
            @csrf
            <div>
                <div>
                    <p>メールアドレス</p>
                    <input type="email" name="email" value="{{old('email')}}">
                </div>
                <div>
                    @error('email') {{-- email のエラーメッセージ表示 --}}
                        {{ $message }}
                    @enderror
                </div>
                <div>
                    <p>パスワード</p>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    @error('password') {{-- email のエラーメッセージ表示 --}}
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <button>ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection
