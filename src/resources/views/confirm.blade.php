@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('content')
<div class="confirm-page">
    <div class="confirm-page__inner">
        <h2 class="confirm-page__title">Confirm</h2>
    </div>
    {{-- 問い合わせ入力フォーム --}}
    <div class="confirm-page__content">
        <form class="confirm-form" action="/thanks" method="post">
            @csrf
            <table class="confirm-table">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__data">{{$contact['last_name']}}&emsp;{{$contact['first_name']}}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__data">{{$contact['gender_text']}}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__data">{{$contact['email']}}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header"></th>
                    <td class="confirm-table__data">{{$contact['tel1']}}{{$contact['tel2']}}{{$contact['tel3']}}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header"></th>
                    <td class="confirm-table__data">{{$contact['address']}}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header"></th>
                    <td class="confirm-table__data">{{$contact['building']}}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header"></th>
                    <td class="confirm-table__data">{{$contact['category_content']}}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header"></th>
                    <td class="confirm-table__data">{{$contact['detail']}}</td>
                </tr>
            </table>
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
            <input type="hidden" name="email" value="{{ $contact['email'] }}">
            <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
            <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
            <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
            <input type="hidden" name="address" value="{{ $contact['address'] }}">
            <input type="hidden" name="building" value="{{ $contact['building'] }}">
            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
            <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
            <div class="confirm-form__actions">
                <button type="submit" class="confirm-form__button">送信</button>
                {{-- 修正ボタン --}}
                <button type="submit" class="confirm-form__button--back"
                formaction="/" actionmethod="post">修正
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                    <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                    <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                    <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                    <input type="hidden" name="email" value="{{ $contact['email'] }}">
                    <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
                    <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
                    <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
                    <input type="hidden" name="address" value="{{ $contact['address'] }}">
                    <input type="hidden" name="building" value="{{ $contact['building'] }}">
                    <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
