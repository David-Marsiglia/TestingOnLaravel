<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
		$rules = [
			'name' => ['required', 'string', 'unique:categories,name,id']
		];
        return $rules;
    }

	public function messages()
	{
		return [
			'name.required' => 'El nombre es requerido',
			'name.string' => 'El nombre debe de ser valido'
		];
	}
}
