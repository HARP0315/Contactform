@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="contact-page"> {{-- Block: お問い合わせページ全体 --}}
    <div class="contact-page__inner"> {{-- Element: ページコンテンツの内側コンテナ --}}
        <h2 class="contact-page__title">Contact</h2> {{-- Element: ページのタイトル --}}
    </div>
    <form class="contact-form" action="/confirm" method="post"> {{-- Block: お問い合わせフォーム --}}
        @csrf
        <div class="contact-form__content"> {{-- Element: フォームの入力項目全体を囲むコンテナ --}}

            <div class="contact-form__group"> {{-- Element: フォームの各入力グループ --}}
                <p class="contact-form__label-text">お名前
                    <span class="contact-form__label-required">※</span> {{-- Element: 必須マーク --}}
                </p>
                <div class="contact-form__input-name"> {{-- Element: 姓と名の入力欄を囲むコンテナ --}}
                    <input class="contact-form__input-field contact-form__input-field--half" {{-- Modifier: 半分の幅の入力欄 --}}
                    type="text" name="last_name"
                    placeholder="例:山田" value="{{ old('last_name') }}">
                    <input class="contact-form__input-field contact-form__input-field--half"
                    type="text" name="first_name"
                    placeholder="例:太郎" value="{{ old('first_name') }}">
                </div>
            </div>
            <div class="contact-form__error-area"> {{-- Element: エラーメッセージ表示エリア --}}
                <ul class="contact-form__error-list"> {{-- Element: エラーリスト --}}
                    @error('last_name')
                    <li class="contact-form__error-item"> {{-- Element: 各エラー項目 --}}
                        {{ $message }}
                    </li>
                    @enderror
                    @error('first_name')
                    <li class="contact-form__error-item">
                        {{ $message }}
                    </li>
                    @enderror
                </ul>
            </div>

            <div class="contact-form__group">
                <p class="contact-form__label-text">性別
                    <span class="contact-form__label-required">※</span>
                </p>
                <div class="contact-form__input-radio"> {{-- Element: ラジオボタンのコンテナ --}}
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
                <input class="contact-form__input-field"
                type="email" name="email"
                placeholder="例:test@sample.com" value="{{ old('email') }}">
            </div>
            @error('email') <p class="contact-form__error">{{ $message }}</p> @enderror

            <div class="contact-form__group">
                <p class="contact-form__label-text">電話番号
                    <span class="contact-form__label-required">※</span>
                </p>
                <div class="contact-form__input-tel"> {{-- Element: 電話番号入力欄のコンテナ --}}
                    <input class="contact-form__input-field contact-form__input-field--tel" type="text" name="tel1"
                    placeholder="080" value="{{ old('tel1') }}"> -
                    <input class="contact-form__input-field contact-form__input-field--tel" type="text" name="tel2"
                    placeholder="1234" value="{{ old('tel2') }}"> -
                    <input class="contact-form__input-field contact-form__input-field--tel" type="text" name="tel3"
                    placeholder="5678" value="{{ old('tel3') }}">
                    <input type="hidden" name="tel" id="full-tel"> {{-- JSで結合した電話番号を格納 --}}
                </div>
            </div>
            <div class="contact-form__error-area">
                <ul class="contact-form__error-list">
                    @error('tel1')
                    <li class="contact-form__error-item">
                        {{ $message }}
                    </li>
                    @enderror
                    @error('tel2')
                    <li class="contact-form__error-item">
                        {{ $message }}
                    </li>
                    @enderror
                    @error('tel3')
                    <li class="contact-form__error-item">
                        {{ $message }}
                    </li>
                    @enderror
                    @error('tel') {{-- tel全体のバリデーションエラーも考慮 --}}
                    <li class="contact-form__error-item">
                        {{ $message }}
                    </li>
                    @enderror
                </ul>
            </div>

            <div class="contact-form__group">
                <p class="contact-form__label-text">住所
                    <span class="contact-form__label-required">※</span>
                </p>
                <input class="contact-form__input-field" type="text" name="address"
                placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
            </div>
            @error('address') <p class="contact-form__error">{{ $message }}</p> @enderror

            <div class="contact-form__group">
                <p class="contact-form__label-text">建物</p>
                <input class="contact-form__input-field" type="text" name="building"
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

        </div> {{-- / .contact-form__content --}}

        <div class="contact-form__actions"> {{-- Element: フォームのボタン群 --}}
            <button type="submit" class="contact-form__button">確認画面</button>
        </div>
    </form>
</div> {{-- / .contact-page --}}
@endsection
