<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules()    //booktableのバリデーション
    {
        return [
          'name' => 'required|string|max:50',    //required=必須、string=文字列のみ、max:50=50文字以下
          'price' => 'required|integer',         //intteger=数値のみ
          'author' => 'nullable|string|max:50',    //nullable=空でもおけ
        ];
    }
}