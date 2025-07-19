@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('link')
<a href="">logout</a>
@endsection

@section('content')
<div>
    <div>
        <div>
            <h2>Admin</h2>
        </div>
        <form class="" action="" method="">
            @csrf
            <div>
                <input type="text">
                <select class="" name=""></select>
                    <option value=""></option>
                <select class="" name=""></select>
                    <option value=""></option>
                    <input type="date" name="" />
            </div>
            <div>
                <div>
                    <button>検索</button>
                </div>
                <input class="" type="reset" name="reset" value="リセット" >
            </div>
        </form>
        <div>
            <form class="" action="" method="">
                @csrf
                <input type="hidden">
                <button>エクスポート</button>
            </form>
            <p>仮）ページネーション</p>
        </div>
        <div>
            <table>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問合せの種類</th>
                </tr>
                <tr>
                    <td>こっこ こっこ</td>
                    <td>中性</td>
                    <td>ひみちゅ</td>
                    <td>お腹すいた</td>
                    <td>
                        <div>
                            <button type="button" class="js-modal-open"
                            data-id="{{ $inquiry->id }}"
                            data-name="{{ $inquiry->name }}"
                            data-gender="{{ $inquiry->gender }}"
                            data-email="{{ $inquiry->email }}"
                            data-tel="{{ $inquiry->tel }}"
                            data-address="{{ $inquiry->address }}"
                            data-content="{{ $inquiry->content }}"
                            data-detail="{{ $inquiry->detail }}">>詳細</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

{{-- モーダル画面 --}}
<div class="modal-overlay js-modal-close"></div>

<div class="modal-main">
    <div class="modal-content">
        <div>
            <button class="modal-close-button js-modal-close">×</button>
        </div>
        <form class="" action="" method="">
            @csrf
            <table>
                <tr>
                    <th>お名前</th>
                    <td id="">こっこ</td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>中性</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>あばばば</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>0000000000</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>あばばば</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>あばばば</td>
                </tr>
                <tr>
                    <th>お問合せの種類</th>
                    <td>あばばば</td>
                </tr>
                <tr>
                    <th>お問合せ内容</th>
                    <td>あばばば</td>
                </tr>
            </table>
            <div>
                <button>削除</button>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('js/deletemordal.js') }}"></script>
@endsection
