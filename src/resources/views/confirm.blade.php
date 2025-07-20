@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('content')
<div>
    <div>
        <div>
            <h2>Confirm</h2>
        </div>
        <div>
            <form class="" action="/thanks" method="POST">
                @csrf
                <table>
                    <tr>
                        <th>お名前</th>
                        <td>{{$contact['last_name']}}&emsp;{{$contact['first_name']}}</td>
                    </tr>
                    <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                    <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                    <tr>
                        <th>性別</th>
                        <td>{{$contact['gender_text']}}</td>
                    </tr>
                    <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{$contact['email']}}</td>
                    </tr>
                    <input type="hidden" name="email" value="{{ $contact['email'] }}">
                    <tr>
                        <th>電話番号</th>
                        <td>{{$contact['tel1']}}{{$contact['tel2']}}{{$contact['tel3']}}</td>
                    </tr>
                    <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
                    <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
                    <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
                    <tr>
                        <th>住所</th>
                        <td>{{$contact['address']}}</td>
                    </tr>
                    <input type="hidden" name="address" value="{{ $contact['address'] }}">
                    <tr>
                        <th>建物名</th>
                        <td>{{$contact['building']}}</td>
                    </tr>
                    <input type="hidden" name="building" value="{{ $contact['building'] }}">
                    <tr>
                        <th>お問い合わせの種類</th>
                        <td>{{$contact['category_content']}}</td>
                    </tr>
                    <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                    <tr>
                        <th>お問い合わせ内容</th>
                        <td>{{$contact['detail']}}</td>
                    </tr>
                    <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                Ï</table>
                <div>
                    <button>送信</button>
                </div>
            </form>
            <div>
                <form action="/" method="post">
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
                    <button>修正</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
