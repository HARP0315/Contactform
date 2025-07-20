<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class UserController extends Controller
{
    protected $genderMap = [
        '1' => '男性',
        '2' => '女性',
        '3' => 'その他',
    ];

    public function index()
    {
        $categories = Category::all();
        $contacts= Contact::with('category')->get();

        // 性別マップをビューに渡す
        $genderMap = $this->genderMap;

        return view('admin', compact('contacts','categories','genderMap'));
    }
}
