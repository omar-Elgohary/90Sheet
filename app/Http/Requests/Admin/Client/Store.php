<?php

namespace App\Http\Requests\Admin\Client;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
			'name'       => 'required|max:191',
			'is_blocked' => 'required',
			'phone'      => 'required|min:10|unique:users,phone',
			'email'      => 'required|email|max:191|unique:users,email,NULL,NULL,deleted_at,NULL',
			'password'   => ['required', 'min:6'],
			'image'      => ['nullable', 'image'],
		];
	}
}
