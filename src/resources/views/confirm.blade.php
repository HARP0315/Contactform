@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('content')
<div class="confirm-page"> {{-- Block: 確認画面全体 --}}
    <div class="confirm-page__inner"> {{-- Element: ページコンテンツの内側コンテナ --}}
        <h2 class="confirm-page__title">Confirm</h2> {{-- Element: ページのタイトル --}}
    </div>
    <div class="confirm-page__content"> {{-- Element: フォームとボタンのコンテンツコンテナ --}}
        <form class="confirm-form" action="/thanks" method="POST"> {{-- Block: 確認画面の送信フォーム --}}
            @csrf
            <table class="confirm-table"> {{-- Block: 確認内容のテーブル --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__data">{{$contact['last_name']}}&emsp;{{$contact['first_name']}}</td>
                </tr>
                {{-- hiddenフィールドはtableの外に配置することが多いですが、現在の構造を維持 --}}
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__data">{{$contact['gender_text']}}</td>
                </tr>
                <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__data">{{$contact['email']}}</td>
                </tr>
                <input type="hidden" name="email" value="{{ $contact['email'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__data">{{$contact['tel1']}}{{$contact['tel2']}}{{$contact['tel3']}}</td>
                </tr>
                <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
                <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
                <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__data">{{$contact['address']}}</td>
                </tr>
                <input type="hidden" name="address" value="{{ $contact['address'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__data">{{$contact['building']}}</td>
                </tr>
                <input type="hidden" name="building" value="{{ $contact['building'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__data">{{$contact['category_content']}}</td>
                </tr>
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__data">{{$contact['detail']}}</td>
                </tr>
                <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
            </table> {{-- テーブルの閉じタグが 'Ï</table>' になっていましたので、'</table>' に修正してください --}}
            <div class="confirm-form__actions"> {{-- Element: フォームのボタン群 --}}
                <button type="submit" class="confirm-form__button">送信</button>
            </div>
        </form>
        <div class="confirm-page__back-form-wrap"> {{-- Element: 修正ボタンのフォームを囲む --}}
            <form class="confirm-form confirm-form--back" action="/" method="post"> {{-- Block/Modifier: 確認画面の修正フォーム --}}
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
                <button type="submit" class="confirm-form__button confirm-form__button--back">修正</button> {{-- Modifier: 修正ボタン --}}
            </form>
        </div>
    </div> {{-- / .confirm-page__content --}}
</div> {{-- / .confirm-page --}}
@endsection
