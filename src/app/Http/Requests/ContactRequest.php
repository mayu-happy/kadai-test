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
            'last_name'    => 'required|string|max:255',
            'first_name'   => 'required|string|max:255',
            'gender'       => 'required|in:1,2,3',
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'email'        => 'required|email|max:255',
            'address'      => 'required|string|max:255',
            'building'     => 'nullable|string|max:255',
            'first_number' => 'required|digits_between:2,5',
            'middle_number' => 'required|digits_between:2,5',
            'last_number'  => 'required|digits_between:2,5',
            'detail'       => 'required|string|max:120',
        ];
    }

    public function messages()
    {
        return [
            'last_name.required'     => '姓を入力してください',
            'first_name.required'    => '名を入力してください',
            'gender.required'        => '性別を選択してください',
            'category_id.required'   => 'お問い合わせの種類を選択してください',
            'email.required'         => 'メールアドレスを入力してください',
            'email.email'            => 'メール形式で入力してください',
            'address.required'       => '住所を入力してください',
            'first_number.required'  => '電話番号を入力してください',
            'middle_number.required' => '電話番号を入力してください',
            'last_number.required'   => '電話番号を入力してください',
            'detail.required'        => 'お問い合わせの内容を入力してください',
            'detail.max'             => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
