<?php

namespace App\Http\Requests\Admin\fqs;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
    
        return [
            'question.ar'                => 'required',
            'question.en'                => 'required',
            'answer.ar'                  => 'required',
            'answer.en'                  => 'required',
        ];;
    }
}
