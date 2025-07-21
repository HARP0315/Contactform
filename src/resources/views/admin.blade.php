@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('link')
<form class="header-nav__form" action="/logout" method="post"> {{-- ヘッダーナビゲーション内のフォーム --}}
    @csrf
    <button class="header-nav__button">logout</button> {{-- ヘッダーナビゲーション内のボタン --}}
</form>
@endsection

@section('content')

<div class="admin-page"> {{-- 管理画面全体 --}}
    <div class="admin-page__inner"> {{-- ページコンテンツの内側コンテナ --}}
        <div class="admin-page__header"> {{-- ページのヘッダー部分（タイトル含む） --}}
            <h2 class="admin-page__title">Admin</h2> {{-- ページのタイトル --}}
        </div>
        <div class="admin-page__content"> {{-- メインコンテンツ部分のコンテナ --}}
            <form class="search-form" action="/admin/search" method="get"> {{-- 検索フォーム --}}
                @csrf
                <div class="search-form__group-container"> {{-- 検索入力フィールドのグループコンテナ --}}
                    <input class="search-form__input-field" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" >
                    <select class="search-form__select" name="gender">
                        <option value="" selected>性別</option>
                        <option value="">すべて</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                        <option value="3">その他</option>
                    </select>
                    <select class="search-form__select" name="category_id">
                        <option value="" selected>お問い合わせの種類</option>

                        @foreach ($categories as $category)
                        <option value="{{$category['id']}}"
                        @if(old('category_id') == $category['id']) selected
                        @endif>{{$category['content']}}</option>
                        @endforeach
                    </select>
                    <input class="search-form__input-field" type="date" name="created_at" placehoder="年/月/日"/>
                </div>
                <div class="search-form__actions"> {{-- 検索フォームのボタン群 --}}
                    <div class="search-form__button-wrapper"> {{-- 検索ボタンのラッパー --}}
                        <button type="submit" class="search-form__button">検索</button>
                    </div>
                    <input class="search-form__button search-form__button--reset" type="reset" name="reset" value="リセット" > {{-- リセットボタン --}}
                </div>
            </form>
            <div class="admin-page__utility-area"> {{-- ページネーションやエクスポートボタンを配置するユーティリティエリア --}}
                {{-- CSVエクスポートフォーム --}}
                <form class="export-form" action="{{ route('admin.export-csv') }}" method="GET"> {{-- エクスポートフォーム --}}
                @csrf
                    {{-- 現在の検索条件をhiddenフィールドとして渡す --}}
                    <input type="hidden" name="keyword" value="{{ request('keyword') }}">
                    <input type="hidden" name="gender" value="{{ request('gender') }}">
                    <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                    <input type="hidden" name="created_at" value="{{ request('created_at') }}">
                    <button type="submit" class="export-form__button">エクスポート</button> {{-- エクスポートボタン --}}
                </form>
                <div class="pagination"> {{-- ページネーションコンテナ --}}
                    {{ $contacts->links() }} {{-- 変数名を変更せず$contactsのまま --}}
                </div>
            </div>
            <div class="contacts-table-section"> {{-- お問い合わせテーブルのセクション --}}
                <table class="contacts-table"> {{-- お問い合わせ一覧テーブル --}}
                    <thead> {{-- テーブルヘッダー --}}
                        <tr class="contacts-table__row">
                            <th class="contacts-table__header">お名前</th>
                            <th class="contacts-table__header">性別</th>
                            <th class="contacts-table__header">メールアドレス</th>
                            <th class="contacts-table__header">お問合せの種類</th>
                            <th class="contacts-table__header contacts-table__header--detail">詳細</th> {{-- 詳細ボタン用のヘッダー --}}
                        </tr>
                    </thead>
                    <tbody> {{-- テーブルボディ --}}
                        @foreach ($contacts as $contact) {{-- 変数名を変更せず$contactsのまま --}}
                        <tr class="contacts-table__row">
                            <td class="contacts-table__data">{{$contact->last_name}}&emsp;{{$contact->first_name}}</td>
                            <td class="contacts-table__data">{{$genderMap[$contact->gender]}}</td> {{-- 変数名を変更せず$contactのまま --}}
                            <td class="contacts-table__data">{{$contact->email}}</td>
                            <td class="contacts-table__data">{{$contact->category['content']}}</td> {{-- 変数名を変更せず$contactのまま --}}
                            <td class="contacts-table__data">
                                <div class="contacts-table__button-wrapper"> {{-- ボタンのラッパー --}}
                                    <button type="button" class="modal-open-button js-modal-open"
                                    data-id="{{ $contact->id }}"
                                    data-last_name="{{ $contact->last_name }}"
                                    data-first_name="{{ $contact->first_name }}"
                                    data-gender="{{ $contact->gender }}" {{-- 変数名を変更せず$contactのまま --}}
                                    data-email="{{ $contact->email }}"
                                    data-tel="{{ $contact->tel }}"
                                    data-address="{{ $contact->address }}"
                                    data-building="{{ $contact->building }}"
                                    data-category_id="{{ $contact->category_id }}" {{-- 変数名を変更せず$contactのまま --}}
                                    data-detail="{{ $contact->detail }}">詳細</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> {{-- / .admin-page__content --}}
    </div> {{-- / .admin-page__inner --}}
</div> {{-- / .admin-page --}}

{{-- モーダル画面 (mainコンテンツの外に置くことが多いが、body直下ならどこでも可) --}}
<div class="modal-overlay js-modal-close"> {{-- モーダルオーバーレイ --}}
    <div class="modal-main"> {{-- モーダル全体 --}}
        <div class="modal-content"> {{-- モーダルのコンテンツ部分 --}}
            <button class="modal-close-button js-modal-close">×</button> {{-- モーダル閉じるボタン --}}
            <form class="modal-form" action="#" method="post" id="delete-form"> {{-- モーダル内のフォーム --}}
                @csrf
                @method('DELETE')
                <table class="modal-table"> {{-- モーダル内のテーブル --}}
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お名前</th>
                        <td class="modal-table__data">
                            <span id="modal-last_name"></span>&emsp;<span id="modal-first_name"></span>
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">性別</th>
                        <td class="modal-table__data" id="modal-gender"></td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">メールアドレス</th>
                        <td class="modal-table__data" id="modal-email"></td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">電話番号</th>
                        <td class="modal-table__data" id="modal-tel"></td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">住所</th>
                        <td class="modal-table__data" id="modal-address"></td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">建物名</th>
                        <td class="modal-table__data" id="modal-building"></td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お問合せの種類</th>
                        <td class="modal-table__data" id="modal-category_id"></td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お問い合わせ内容</th>
                        <td class="modal-table__data" id="modal-detail"></td>
                    </tr>
                </table>
                <button type="submit" class="modal-form__button modal-form__button--delete">削除</button> {{-- 削除ボタン --}}
            </form>
        </div>
    </div> {{-- / .modal-main --}}
</div> {{-- / .modal-overlay --}}

<script src="{{ asset('js/deletemordal.js') }}"></script>
@endsection
