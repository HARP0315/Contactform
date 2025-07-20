<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    protected $genderMap = [
        '1' => '男性',
        '2' => '女性',
        '3' => 'その他',
    ];

    public function index(Request $request){

        $categories = Category::all();

        // もしリクエストがPOST（つまりConfirm画面からの修正ボタン）の場合
        if ($request->isMethod('post')) {
        // リクエストデータ全てをセッションにフラッシュする (old()関数で使えるようにする)
            $request->flash();

        }
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request){

        $contactData = $request->only(
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building',
            'detail'
        );

        // フォームから送られてきた category_id を使ってCategoryテーブルからレコードを取得
        $category = Category::find($contactData['category_id']);

        // 取得したカテゴリ名（content）を $contactData に追加する
        $contactData['category_content'] = $category->content;

        $contactData['gender_text'] = $this->genderMap[$contactData['gender']];

        // 最終的にビューに渡す変数名に戻す（$contact）
        $contact = $contactData;

        // confirmビューに $contact 変数を渡す
        return view('confirm', compact('contact'));

    }

    public function store(Request $request){

        $contact = $request->only(
            'category_id',
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building',
            'detail',
            'content');

        $contact['tel'] = $contact['tel1'] . $contact['tel2'] . $contact['tel3'];
        unset($contact['tel1'], $contact['tel2'], $contact['tel3']);

        Contact::create($contact);

        return view('thanks');
}

}
