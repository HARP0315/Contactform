@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="contact-page">
    {{-- タイトル --}}
    <div class="contact-page__inner">
        <h2 class="contact-page__title">Contact</h2>
    </div>
    {{-- お問い合わせ入力フォーム --}}
    <form class="contact-form" action="/confirm" method="post">
        @csrf
        <div class="contact-form__content">
            <div class="contact-form__group">
                <p class="contact-form__label-text">お名前
                    <span class="contact-form__label-required">※</span>
                </p>
                <div class="contact-form__input-name">
                    <input class="contact-form__input-field"
                    type="text" name="last_name"
                    placeholder="例:山田" value="{{ old('last_name') }}">
                    <input class="contact-form__input-field"
                    type="text" name="first_name"
                    placeholder="例:太郎" value="{{ old('first_name') }}">
                </div>
            </div>
            {{-- TODO 課題：複数フィールド バリデーションまとめたい（時間次第） --}}
            <p class="contact-form__error">@error('first_name'){{ $message }}@enderror
                &emsp;@error('last_name'){{ $message }}@enderror</p>
            <div class="contact-form__group">
                <p class="contact-form__label-text">性別
                    <span class="contact-form__label-required">※</span>
                </p>
                <div class="contact-form__input-radio">
                    <label class="contact-form__radio-label"><input class="contact-form__radio-input" type="radio" name="gender" value="1" checked>男性</label>
                    <label class="contact-form__radio-label"><input class="contact-form__radio-input" type="radio" name="gender" value="2" >女性</label>
                    <label class="contact-form__radio-label"><input class="contact-form__radio-input" type="radio" name="gender" value="3" >その他</label>
                </div>
            </div>
            @error('gender') <p class="contact-form__error">{{ $message }}</p> @enderror
            <div class="contact-form__group">
                <p class="contact-form__label-text">メールアドレス
                    <span class="contact-form__label-required">※</span>
                </p>
                <input class="contact-form__input-field--email"
                type="email" name="email"
                placeholder="例:test@sample.com" value="{{ old('email') }}">
            </div>
            @error('email') <p class="contact-form__error">{{ $message }}</p>@enderror
            <div class="contact-form__group">
                <p class="contact-form__label-text">電話番号
                    <span class="contact-form__label-required">※</span>
                </p>
                <div class="contact-form__input-tel">
                    <input class="contact-form__input-field--tel" type="text" name="tel1"
                    placeholder="080" value="{{ old('tel1') }}"> <span>-</span>
                    <input class="contact-form__input-field--tel" type="text" name="tel2"
                    placeholder="1234" value="{{ old('tel2') }}"> <span>-</span>
                    <input class="contact-form__input-field--tel" type="text" name="tel3"
                    placeholder="5678" value="{{ old('tel3') }}">
                </div>
            </div>
            {{-- TODO 課題：複数フィールド バリデーションまとめたい（時間次第） --}}
            <p class="contact-form__error">@error('tel1'){{ $message }}@enderror
                &emsp;@error('tel2'){{ $message }}@enderror&emsp;@error('tel3'){{ $message }}@enderror</p>
            <div class="contact-form__group">
                <p class="contact-form__label-text">住所
                    <span class="contact-form__label-required">※</span>
                </p>
                <input class="contact-form__input-field--address" type="text" name="address"
                placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
            </div>
            @error('address') <p class="contact-form__error">{{ $message }}</p> @enderror
            <div class="contact-form__group">
                <p class="contact-form__label-text">建物</p>
                <input class="contact-form__input-field--building" type="text" name="building"
                placeholder="例:千駄ヶ谷マンション123" value="{{ old('building') }}">
            </div>
            @error('building') <p class="contact-form__error">{{ $message }}</p> @enderror
            <div class="contact-form__group">
                <p class="contact-form__label-text">お問い合わせの種類
                    <span class="contact-form__label-required">※</span>
                </p>
                <div class="contact-form__input-select"> {{-- Element: セレクトボックスのコンテナ --}}
                    <select class="contact-form__select" name="category_id">
                        <option value=""
                        @if(old('category_id') === null || old('category_id') === '') selected
                        @endif>選択してください</option>
                        {{-- データの取り出し --}}
                        @foreach ($categories as $category)
                        <option value="{{$category['id']}}"
                        @if(old('category_id') == $category['id']) selected
                        @endif>{{$category['content']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('category_id') <p class="contact-form__error">{{ $message }}</p> @enderror
            <div class="contact-form__group">
                <p class="contact-form__label-text">お問い合わせ内容
                    <span class="contact-form__label-required">※</span>
                </p>
                <textarea class="contact-form__textarea" name="detail"
                cols="30" rows="10" placeholder="お問い合わせ内容をご記載ください" >{{ old('detail') }}</textarea>
            </div>
            @error('detail') <p class="contact-form__error">{{ $message }}</p> @enderror
        </div>
        {{-- 確認ボタン --}}
        <div class="contact-form__actions">
            <button type="submit" class="contact-form__button">確認画面</button>
        </div>
    </form>
</div>
@endsection
