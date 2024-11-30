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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'integer', 'in:1,2,3'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tel' => ['required', 'numeric','digits_between:5'], // 
            'address' => ['required', 'string', 'max:255'],
            'building' => ['nullable', 'string', 'max:255'],
            'inquiry_type' => ['required', 'integer', 'in:1,2,3,4,5'],
            'detail' => ['required', 'string', 'max:120'],
        ];
    }

    /**
     * Custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => '名を入力してください。',
            'last_name.required' => '姓を入力してください。',
            'gender.required' => '性別を選択してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください。',
            'tel.required' => '電話番号を入力してください。',
            'tel.numeric' => '電話番号は半角数字で入力してください。',
            'tel.digits_between' => '電話番号は5桁の数字で入力してください。',
            'address.required' => '住所を入力してください。',
            'building.required' => '建物名を入力してください。',
            'inquiry_type.required' => 'お問い合わせの種類を選択してください。',
            'detail.required' => 'お問い合わせ内容を入力してください。',
            'detail.max' => 'お問い合わせ内容の入力文字数は120文字以内にしてください。',
        ];
    }
}

unsignedBigInteger('category_id');
        
         
           