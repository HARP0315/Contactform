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
            <form action="">
                @csrf
                <table>
                    <tr>
                        <th>お名前</th>
                        <td>こっこ こっこ</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                    </tr>
                Ï</table>
                <div>
                    <button>送信</button>
                    <button>修正</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
