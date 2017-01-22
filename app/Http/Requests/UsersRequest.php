<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        return 	$infos=[
		'email' => 'required|email|max:255|unique:users',
		'name'=>'required|max:255|min:3',
		'lastname'=>'required|max:255|min:3',
		'street'=>'required|max:255|min:3',
		'extrainfo'=>'required|max:255|min:3',
		'city'=>'required|max:255|min:3',
		'postalcode'=>'required|max:255|min:3',
		];
    }
}
