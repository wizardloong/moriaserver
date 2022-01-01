<?php

namespace App\Http\Requests\Home\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->route()->user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|required',
            'email' => 'required|email|unique:users,email,' . $this->route()->user->id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ];
    }
}
