<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'unique:'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
