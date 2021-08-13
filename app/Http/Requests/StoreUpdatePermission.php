<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePermission extends FormRequest
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
        $id = $this->segment(3); // para validar que no se repita el campo, capturo el id.

        return [
            'name' => "required|min:3|max:150|unique:permissions,name,{$id},id", //consulto si el id existe
            'description' =>'nullable|min:3|max:255'
        ];
    }
}
