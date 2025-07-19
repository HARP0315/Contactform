<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:10',
            'last_name' => 'required|string|max:10',
            'gender' => 'required',
            'email' => 'required|string|email',
            'tel1' => 'required|digits_between:1,5',
            'tel2' => 'required|digits_between:1,5',
            'tel3' => 'required|digits_between:1,5',
            'address' => 'required|string|max:50',
            'building' => 'string',
            'category_id' => 'required|string|',
            'detail' => 'required|string|max:120'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => '名を入力してください',
            'first_name.string' => '名は文字列で入力してください',
            'first_name.max' => '名は10文字以下で入力してください',
            'last_name.required' => '性を入力してください',
            'last_name.string' => '性は文字列で入力してください',
            'last_name.max' => '性は10文字以下で入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスは文字列で入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel1.required' => '電話番号を入力してください',
            'tel1.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel2.required' => '電話番号を入力してください',
            'tel2.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel3.required' => '電話番号を入力してください',
            'tel3.digits_between' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所は文字列で入力してください',
            'address.max' => '住所は50文字以下で入力してください',
            'building.string' => '建物は文字列で入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.string' => 'お問い合わせは文字列で入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください'
        ];
    }
}
