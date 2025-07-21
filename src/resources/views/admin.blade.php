@extends('layouts.app')

{{-- CSSリンク上手くできてないから一旦ここに書き --}}
<style>
    svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
        width: 30px;
        height: 30px;
    }
</style>

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('link')
<form class="form" action="/logout" method="post">
    @csrf
    <button class="header-nav__button">ログアウト</button>
</form>
@endsection

@section('content')

<div>
    <div>
        <div>
            <h2>Admin</h2>
        </div>
        <form class="" action="/admin/search" method="get">
            @csrf
            <div>
                <input type="text" name="keyword" placeholder="名前やネームアドレスを入力してください" >
                <select class="" name="gender">
                    <option value="" selected>性別</option>
                    <option value="">すべて</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
                <select class="" name="category_id">
                    <option value="" selected>お問い合わせの種類</option>

                        @foreach ($categories as $category)
                        <option value="{{$category['id']}}"
                        @if(old('category_id') == $category['id']) selected
                        @endif>{{$category['content']}}
                    </option>
                        @endforeach
                </select>
                    <input type="date" name="created_at" placehoder="年/月/日"/>
            </div>
            <div>
                <div>
                    <button>検索</button>
                </div>
                <input class="" type="reset" name="reset" value="リセット" >
            </div>
        </form>
        <div>
            {{-- CSVエクスポートフォーム --}}
            {{-- このフォームはGETメソッドで、現在の検索条件をhiddenフィールドで送ります --}}
            <form action="{{ route('admin.export-csv') }}" method="GET">
            @csrf
                {{-- 現在の検索条件をhiddenフィールドとして渡す --}}
                {{-- UserControllerのindexメソッドから取得した request() ヘルパーで値を取得 --}}
                <input type="hidden" name="keyword" value="{{ request('keyword') }}">
                <input type="hidden" name="gender" value="{{ request('gender') }}">
                <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                <input type="hidden" name="created_at" value="{{ request('created_at') }}">
                {{-- 他の検索条件もあれば同様に追加 --}}
                <button type="submit">エクスポート</button>
            </form>
            {{ $contacts->links() }}
        </div>
        <div>
            <table>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問合せの種類</th>
                </tr>
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{$contact['last_name']}}&emsp;{{$contact['first_name']}}</td>
                    <td>{{$genderMap[$contact->gender]}}</td>
                    <td>{{$contact['email']}}</td>
                    <td>{{$contact['category']['content']}}</td>
                    <td>
                        <div>
                            <button type="button" class="js-modal-open"
                            data-id="{{ $contact->id }}"
                            data-last_name="{{ $contact->last_name }}"
                            data-first_name="{{ $contact->first_name }}"
                            data-gender="{{ $contact->gender }}"
                            data-email="{{ $contact->email }}"
                            data-tel="{{ $contact->tel }}"
                            data-address="{{ $contact->address }}"
                            data-building="{{ $contact->building }}"
                            data-category_id="{{ $contact->category_id }}"
                            data-detail="{{ $contact->detail }}">>詳細</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

{{-- モーダル画面 --}}
<div class="modal-overlay js-modal-close">

    <div class="modal-main">
        <div class="modal-content">
            <div>
                <button class="modal-close-button js-modal-close">×</button>
            </div>
            <form class="" action="#" method="post" id="delete-form">
                @csrf
                @method('DELETE')
                <table>
                    <tr>
                        <th>お名前</th>
                        <td>
                            <span id="modal-last_name"></span>&emsp;<span id="modal-first_name"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td id="modal-gender"></td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td id="modal-email"></td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td id="modal-tel"></td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td id="modal-address"></td>
                    </tr>
                    <tr>
                        <th>建物名</th>
                        <td id="modal-building"></td>
                    </tr>
                    <tr>
                        <th>お問合せの種類</th>
                        <td id="modal-category_id"></td>
                    </tr>
                    <tr>
                        <th>お問合せ内容</th>
                        <td id="modal-detail"></td>
                    </tr>
                </table>
                <div>
                    <button>削除</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/deletemordal.js') }}"></script>
@endsection
