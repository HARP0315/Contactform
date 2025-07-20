@extends('layouts.app')

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
        <form class="" action="" method="">
            @csrf
            <div>
                <input type="text" name="" placeholder="名前やネームアドレスを入力してください">
                <select class="" name="gender">
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
                <select class="" name="category_id">
                    <option value=""
                        @if(old('category_id')
                        === null || old('category_id') === '') selected
                        @endif>お問い合わせの種類
                    </option>

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
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{$contact['last_name']}}&emsp;{{$contact['first_name']}}</td>
                    <td>{{$genderMap[$contact->gender]}}</td>
                    <td>{{$contact['email']}}</td>
                    <td>{{$contact['detail']}}</td>
                    <td>
                        <div>
                            <form action="">
                            <button type="button" class="js-modal-open"
                            data-id=" inquiry->id }}"
                            data-name="inquiry->name }}"
                            data-gender="inquiry->gender }}"
                            data-email="inquiry->email }}"
                            data-tel="inquiry->tel }}"
                            data-address="inquiry->address }}"
                            data-content="inquiry->content }}"
                            data-detail="inquiry->detail }}">>詳細</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
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
