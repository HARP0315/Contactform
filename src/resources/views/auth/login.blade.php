@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('link')
<a href="">register</a>
@endsection

@section('content')
<div>
    <div>
        <div>
            <h2>Login</h2>
        </div>
        <form class="" action="" method="">
            @csrf
            <div>
                <div>
                    <label for="⚫︎">メールアドレス</label>
                    <input type="email" name="" id="⚫︎">
                </div>
                <div>
                    <label for="⚫︎">パスワード</label>
                    <input type="password" name="" id="⚫︎">
                </div>
            </div>
            <div>
                <button>ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection
