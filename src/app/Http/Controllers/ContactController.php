<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        return view('index');
    }

    public function confirm(ContactRequest $request){

        $tel = $request->tel1 . $request->tel2 . $request->tel3;
        $contact = $request
        ->only(['first_name'],['last_name'],['gender'],['email'],['tel'],['address'],['building'],['detail']);

        return view('/confirm',compact('contact'));

    }
}
