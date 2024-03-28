<?php

namespace App\Http\Requests\Admin\countries;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends FormRequest
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
            'name.ar'                => 'required|max:191',
            'name.en'                => 'required|max:191' ,
            'key'                    => ['required' ,  Rule::unique('countries')->ignore($this->id)],
            'image'                  => 'nullable|image',

        ];
    }
}
