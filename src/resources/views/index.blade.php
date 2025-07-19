@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div>
    <div>
        <h2>Contact</h2>
    </div>
    <form class="" action="/confirm" method="post">
        @csrf
        <div>
            <div>
                <p>お名前
                    <span>※</span>
                </p>
                <div>
                    <input class=""
                    type="text" name="last_name"
                    placeholder="例:山田" value="{{ old('last_name') }}">
                    <input class=""
                    type="text" name="first_name"
                    placeholder="例:太郎" value="{{ old('first_name') }}">
                </div>
            </div>
            <div>
                <ul>
                    @error('last_name')
                    <li>
                        {{ $message }}
                    </li>
                    @enderror
                    @error('first_name')
                    <li>
                        {{ $message }}
                    </li>
                    @enderror
                </ul>
            </div>
            <div>
                <p>性別
                    <span>※</span>
                </p>
                <div>
                    <input class="" type="radio" name="gender" value="男性" checked>男性
                    <input class="" type="radio" name="gender" value="女性" >女性
                    <input class="" type="radio" name="gender" value="その他" >その他
                </div>
            </div>
            @error('gender')
            {{ $message }}
            @enderror
            <div>
                <p>メールアドレス
                    <span>※</span>
                </p>
                <input class=""
                type="email" name="email"
                placeholder="例:test@sample.com" value="{{ old('email') }}">
            </div>
            @error('email')
            {{ $message }}
            @enderror
            <div>
                <p>電話番号
                    <span>※</span>
                </p>
                <div>
                    {{-- <input type="text" id="tel-part1" class="tel-input"
                    placeholder="080" value="{{ old('tel-part1') }}"> -
                    <input type="text" id="tel-part2" class="tel-input"
                    placeholder="1234" value="{{ old('tel-part2') }}"> -
                    <input type="text" id="tel-part3" class="tel-input"
                    placeholder="5678" value="{{ old('tel-part3') }}">
                    <input type="hidden" name="tel" id="full-tel"> --}}
                    <input type="text" name="tel1" class=""
                    placeholder="080" value="{{ old('tel1') }}"> -
                    <input type="text" name="tel2" class=""
                    placeholder="1234" value="{{ old('tel2') }}"> -
                    <input type="text" name="tel3" class=""
                    placeholder="5678" value="{{ old('tel3') }}">
                </div>
            </div>
            <div>
                <ul>
                    @error('tel1')
                    <li>
                        {{ $message }}
                    </li>
                    @enderror
                    @error('tel2')
                    <li>
                        {{ $message }}
                    </li>
                    @enderror
                    @error('tel3')
                    <li>
                        {{ $message }}
                    </li>
                    @enderror
                </ul>
            </div>
            <div>
                <p>住所
                    <span>※</span>
                </p>
                <input class="" type="text" name="address"
                placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
            </div>
            @error('address')
            {{ $message }}
            @enderror
            <div>
                <p>建物</p>
                <input class="" type="text" name="building"
                placeholder="例:千駄ヶ谷マンション123" value="{{ old('building') }}">
            </div>
            @error('building')
            {{ $message }}
            @enderror
            <div>
                <p>お問い合わせの種類
                    <span>※</span>
                </p>
                <div>
                    <select name="category_id">
                        <option value="">選択してください</option>
                    </select>
                </div>
            </div>
            @error('category_id')
            {{ $message }}
            @enderror
            <div>
                <p>お問い合わせ内容
                    <span>※</span>
                </p>
                <textarea name="detail"
                cols="30" rows="10" placeholder="お問い合わせ内容をご記載ください" >{{ old('detail') }}</textarea>
            </div>
            @error('detail')
            {{ $message }}
            @enderror
        </div>
        <div>
            <button>確認画面</button>
        </div>
    </form>
    <script src="{{ asset('js/tel.js') }}"></script>
</div>
@endsection
