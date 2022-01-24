<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                
            ],
            'email' => [
                'required',
                'unique:users',
                'min:6',
                'max:100'
            ],
            'password' => [
                'required',
                'min:6',
                'max:100'
            ]
        ];
    }
}
