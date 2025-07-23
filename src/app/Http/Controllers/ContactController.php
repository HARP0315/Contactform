<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    // tinyint'gender'の日本語化リスト
    protected $genderMap = [
        '1' => '男性',
        '2' => '女性',
        '3' => 'その他',
    ];

    /**
     * 問合せフォーム、/confirmの修正ボタンからのアクセス時のアクション
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request){

        // categoriesテーブルからのデータ取得
        $categories = Category::all();

        // もしリクエストがPOST＝Confirm画面からの修正ボタンの場合
        if ($request->isMethod('post')) {
        // リクエストデータ全てをセッション。old()関数で使えるようにする
            $request->flash();

        }
        return view('index', compact('categories'));
    }

    /**
     * 問合せ内容確認画面へのアクション
     *
     * @param ContactRequest $request
     * @return void
     */
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

        // 取得した'content'を $contactData に追加
        $contactData['category_content'] = $category->content;

        // 取得したgender（日本語）を $contactData に追加
        $contactData['gender_text'] = $this->genderMap[$contactData['gender']];

        // 最終的にビューに渡す変数名に戻す（$contact）
        $contact = $contactData;

        // confirmビューに $contact 変数を渡す
        return view('confirm', compact('contact'));

    }

    /**
     * 問い合わせ内容のデータベースへの格納
     *
     * @param Request $request
     * @return void
     */
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

        // ['tel']はtel1~3を結合とする
        $contact['tel'] = $contact['tel1'] . $contact['tel2'] . $contact['tel3'];
        // tel1~3を配列から削除
        unset($contact['tel1'], $contact['tel2'], $contact['tel3']);

        // Contactモデルを使用して作成
        Contact::create($contact);

        return view('thanks');
}

}
