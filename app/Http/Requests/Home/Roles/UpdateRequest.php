<?php

namespace App\Http\Requests\Home\Roles;

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
        return $this->user()->can('update', $this->route()->role);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|required|unique:roles,name,' . $this->route()->role->id . ',id',
            'code' => 'string|required|unique:roles,code,' . $this->route()->role->id . ',id',
            'permission' => 'required',
        ];
    }
}
