<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'post' => 'required|regex:/^\d{3}-\d{4}$/',
            'address' => 'required|string',
        ];
        if ($this->hasFile('image')) {
            $rules['image'] = 'required|image|max:1048';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.string' => '名前を文字列で入れてください',
            'post.required' => '郵便番号を入力してください',
            'post.regex' => '郵便番号をハイフンあり半角８文字で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入れてください',
            'image.max' => 'アップロードされた画像は1MB以下である必要があります。',
        ];
    }
}
