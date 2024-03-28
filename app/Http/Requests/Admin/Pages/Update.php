<?php

namespace App\Http\Requests\Admin\Pages;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                  => 'required|array',
            'title.*'                  => 'required|string',
            'content'                  => 'required|array',
            'content.*'                  => 'required|string',
        ];
    }
}
