<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){

        $categories = Category::all();
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

        // 最終的にビューに渡す変数名に戻す（$contact）
        $contact = $contactData;

        // confirmビューに $contact 変数を渡す
        return view('confirm', compact('contact'));

    }

}
