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

<div class="admin-page">
    <div class="admin-page__inner">
        {{-- タイトル --}}
        <div class="admin-page__header">
            <h2 class="admin-page__title">Admin</h2>
        </div>
        <div class="admin-page__content">
            {{-- search群 --}}
            {{-- TODO 課題：HTMLの構造 修正必要 --}}
            <form class="search-form" action="/admin/search" method="get">
                @csrf
                <div class="search-form__group-container">
                    <div class="search-form__input">
                        {{-- 検索内容 --}}
                        {{-- TODO 矢印修正の範囲外になるように構造修正必要 --}}
                        <input class="search-form__input-field" type="text"
                        name="keyword" placeholder="名前やメールアドレスを入力してください" >
                        {{-- TODO 本当は擬似要素で矢印つけたい。構造修正必要 --}}
                        <select class="search-form__select" name="gender">
                            <option value="" selected>性別</option>
                            <option value="">すべて</option>
                            <option value="1">男性</option>
                            <option value="2">女性</option>
                            <option value="3">その他</option>
                        </select>
                        {{-- TODO 本当は擬似要素で矢印つけたい。構造修正必要 --}}
                        <select class="search-form__select" name="category_id">
                            <option value="" selected>お問い合わせの種類</option>
                            {{-- データ取り出し --}}
                            @foreach ($categories as $category)
                            <option value="{{$category['id']}}"
                            @if(old('category_id') == $category['id']) selected
                            @endif>{{$category['content']}}</option>
                            @endforeach
                        </select>
                        <input class="search-form__input-field" type="date" name="created_at"
                        placehoder="年/月/日"/>
                        {{-- 検索・リセットボタン --}}
                    </div>
                    <div class="search-form__wrapper">
                            <button type="submit" class="search-form__button">検索</button>
                        <input class="search-form__button--reset" type="reset" name="reset" value="リセット" >
                    </div>
                </div>
            </form>
            {{-- CSVエクスポート --}}
            <div class="admin-page__utility-area">
                <form class="export-form" action="{{ route('admin.export-csv') }}" method="GET">
                @csrf
                    {{-- 現在の検索条件をhiddenフィールドとして渡す --}}
                    <input type="hidden" name="keyword" value="{{ request('keyword') }}">
                    <input type="hidden" name="gender" value="{{ request('gender') }}">
                    <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                    <input type="hidden" name="created_at" value="{{ request('created_at') }}">
                    <button type="submit" class="export-form__button">エクスポート</button>
                </form>
                <div class="pagination">
                    {{ $contacts->links('vendor.pagination.tailwind2') }}
                </div>
            </div>
            {{-- 問合せテーブル --}}
            <div class="contacts-table-section">
                <table class="contacts-table">
                    <tr class="contacts-table__row">
                        <th class="contacts-table__header">お名前</th>
                        <th class="contacts-table__header">性別</th>
                        <th class="contacts-table__header">メールアドレス</th>
                        <th class="contacts-table__header">お問合せの種類</th>
                        <th class="contacts-table__header contacts-table__header--detail"></th>
                    </tr>
                    @foreach ($contacts as $contact)
                    <tr class="contacts-table__row">
                        <td class="contacts-table__data">{{$contact->last_name}}&emsp;{{$contact->first_name}}</td>
                        <td class="contacts-table__data">{{$genderMap[$contact->gender]}}</td>
                        <td class="contacts-table__data">{{$contact->email}}</td>
                        <td class="contacts-table__data">{{$contact->category['content']}}</td>
                        <td class="contacts-table__data">
                            <div class="contacts-table__button-wrapper">
                                {{-- TODO 課題：JS未勉強なので全くわからず。AIが書いたものを転載 --}}
                                <button type="button" class="modal-open-button js-modal-open"
                                data-id="{{ $contact->id }}"
                                data-last_name="{{ $contact->last_name }}"
                                data-first_name="{{ $contact->first_name }}"
                                data-gender="{{ $contact->gender }}"
                                data-email="{{ $contact->email }}"
                                data-tel="{{ $contact->tel }}"
                                data-address="{{ $contact->address }}"
                                data-building="{{ $contact->building }}"
                                data-category_id="{{ $contact->category_id }}"
                                data-category_content="{{ $contact->category['content'] }}"
                                data-detail="{{ $contact->detail }}">詳細
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

{{-- モーダル画面 --}}
<div class="modal-overlay js-modal-close">
    <div class="modal-main">
        <div class="modal-content">
            <button class="modal-close-button js-modal-close">×</button>
            <form class="modal-form" action="#" method="post" id="delete-form">
                @csrf
                @method('DELETE')
                <table class="modal-table">
                    {{-- TODO 課題：モーダルで表示されない。変数で指定すると、ずっと1人の名前が表示される --}}
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お名前</th>
                        <td class="modal-table__data">
                            <span id="modal-last_name"></span>&emsp;<span id="modal-first_name"></span>
                        </td>
                    </tr>
                    {{-- TODO 課題：モーダルで表示されない。出るのは性別の数字だけ。変換されない --}}
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
                    {{--TODO 課題：モーダルで表示されない。変数で指定しても出るのはcategory_idの数字だけ。変換されない --}}
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お問合せの種類</th>
                        <td class="modal-table__data" id="modal-category_id"></td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お問い合わせ内容</th>
                        <td class="modal-table__data" id="modal-detail"></td>
                    </tr>
                </table>
                <button type="submit" class="modal-form__button modal-form__button--delete">削除</button>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/deletemordal.js') }}"></script>
@endsection
