<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            'category' => 'required',
            'situation' => 'required|string',
            'product_name' => 'required|string',
            'explanation' => 'required|string',
            'price' => 'required|numeric|regex:/^[0-9]+$/',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => '画像を選択してください',
            'image.max' => 'アップロードされた画像は1MB以下である必要があります。',
            'category.required' => 'カテゴリーを選択してください',
            'situation.required' => '状態を入力してください',
            'situation.string' => '状態を文字列で入れてください',
            'product_name.required' => '商品名を入力してください',
            'product_name.string' => '商品名を文字列で入れてください',
            'explanation.required' => '説明を入力してください',
            'explanation.string' => '説明を文字列で入れてください',
            'price.required' => '価格を入力してください',
            'price.numeric' => '価格を数値で入力してください',
            'price.regex' => '価格を半角数字でしてください',
        ];
    }

}
