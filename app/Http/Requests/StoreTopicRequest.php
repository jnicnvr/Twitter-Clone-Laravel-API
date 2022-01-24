<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopicRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'body' => 'required|max:1000'
        ];
    }
}
