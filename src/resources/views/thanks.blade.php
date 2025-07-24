@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/thanks.css')}}">
@endsection

@section('content')
<div class="thanks-page">
    <div class="thanks-page__inner">
        <div class="thanks-page__message">お問い合わせありがとうございました</div>
        <div class="thanks-page__actions">
            <a class="thanks-page__home-link" href="/">HOME</a>
        </div>
    </div>
</div>
@endsection
