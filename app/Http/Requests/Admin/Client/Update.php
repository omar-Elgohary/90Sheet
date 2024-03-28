<?php

namespace App\Http\Requests\Admin\Client;

use Illuminate\Foundation\Http\FormRequest;

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
            'name'     => 'required|max:191',
            'is_blocked'  => 'required',
            'phone'    => 'required|min:10|unique:users,phone,' . $this->id,
            'email'    => 'required|email|max:191|unique:users,email,' . $this->id,
            'password' => ['nullable', 'min:6'],
            'image'   => ['nullable', 'image'],
        ];
    }
}
