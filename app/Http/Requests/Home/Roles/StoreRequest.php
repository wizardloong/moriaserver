<?php

namespace App\Http\Requests\Home\Roles;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Role::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|required|unique:roles,name',
            'code' => 'string|required|unique:roles,code',
            'permission' => 'required'
        ];
    }
}
