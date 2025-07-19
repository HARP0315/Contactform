@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div>
    <div>
        <h2>Contact</h2>
    </div>
    <form class="" action="" method="">
        @csrf
        <div>
            <div>
                <p>お名前
                    <span>※</span>
                </p>
                <div>
                    <input class="" type="text" name="" placeholder="例:山田" >
                    <input class="" type="text" name="" placeholder="例:太郎" >
                </div>
            </div>
            <div>
                <p>性別
                    <span>※</span>
                </p>
                <div>
                    <input class="" type="radio" name="" value="男性" >男性
                    <input class="" type="radio" name="" value="女性" >女性
                    <input class="" type="radio" name="" value="その他" >その他
                </div>
            </div>
            <div>
                <p>メールアドレス
                    <span>※</span>
                </p>
                <input class="" type="email" name="" placeholder="例:test@sample.com" >
            </div>
            <div>
                <p>電話番号
                    <span>※</span>
                </p>
                <div>
                    <input type="text" id="tel-part1" class="tel-input" maxlength="⚫︎" placeholder="080"> -
                    <input type="text" id="tel-part2" class="tel-input" maxlength="⚫︎" placeholder="1234"> -
                    <input type="text" id="tel-part3" class="tel-input" maxlength="⚫︎"
                    placeholder="5678">
                    <input type="hidden" name="tel" id="full-tel">
                </div>
            </div>
            <div>
                <p>住所
                    <span>※</span>
                </p>
                <input class="" type="text" name="" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" >
            </div>
            <div>
                <p>建物
                    <span>※</span>
                </p>
                <input class="" type="text" name="" placeholder="例:千駄ヶ谷マンション123" >
            </div>
            <div>
                <p>お問い合わせの種類
                    <span>※</span>
                </p>                        <div>
                    <select name="">
                        <option value="">選択してください</option>
                    </select>
                </div>
            </div>
            <div>
                <p>お問い合わせ内容
                    <span>※</span>
                </p>
                <textarea name=""
                cols="30" rows="10" placeholder="お問い合わせ内容をご記載ください" ></textarea>
            </div>
        </div>
        <div>
            <button>確認画面</button>
        </div>
    </form>
    <script src="{{ asset('js/tel.js') }}"></script>
</div>
@endsection
