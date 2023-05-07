<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CosmeRequest extends FormRequest
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
            'cosme' => 'required',
            'price' => 'required | numeric',
            'category' => 'required',
            'body' => 'required | max:500'
        ];
    }

    public function messages(){
        return [
        'cosme.required' => '商品名は必須入力です。',
        'price.required' => '値段は必須入力です。',
        'price.numeric' => '値段は必須入力です。',
        'category.required' => 'いずれか選択してください。',
        'body.required' => '商品説明は必須入力です。',
        'body.max' => '商品説明は500文字までです。',
        ];
    }
}
