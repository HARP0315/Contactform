@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('link')
<a href="">login</a>
@endsection

@section('content')
<div>
    <div>
        <div>
            <h2>Register</h2>
        </div>
        <form class="" action="" method="">
            @csrf
            <div>
                <div>
                    <label for="⚫︎">お名前</label>
                    <input type="text" name="" id="⚫︎">
                </div>
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
                <button>登録</button>
            </div>
        </form>
    </div>
</div>
@endsection
