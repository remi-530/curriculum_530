<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassRequest extends FormRequest
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
            'email' => 'required | email | nullable',
            'password' => 'required | regex:/^[a-z0-9]+$/i '
        ];
    }

    public function messages(){
        return [
        'email.required' => 'メールアドレスは必須入力です。',
        'email.email' => 'メールアドレスは正しくご入力ください。',
        'password.required' => 'パスワードは必須入力です。',
        'password.regex' => '使える文字は英数字のみです。'
        ];
    }
}
