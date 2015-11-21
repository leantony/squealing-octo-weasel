<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactsRequest extends Request
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
        $rules = [
            'owner_id' => 'required|exists:users,id',
            'first_name' => 'required|alpha|between:3,20',
            'last_name' => 'required|alpha|between:3,20',
            'email' => 'required|unique:contacts',
            'address' => 'required|unique:contacts',
            'twitter' => 'required|unique:contacts',
        ];

        if ($this->isMethod('patch')) {

            $rules['owner_id'] = 'sometimes|required|exists:users,id';
            $rules['first_name'] = 'sometimes|required|alpha|between:3,20';
            $rules['last_name'] = 'sometimes|required|alpha|between:3,20';
            $rules['email'] = 'sometimes|required|unique:contacts';
            $rules['twitter'] = 'sometimes|required|unique:contacts';
        }

        return $rules;
    }
}
