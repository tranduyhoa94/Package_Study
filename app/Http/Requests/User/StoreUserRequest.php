<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class StoreUserRequest extends BaseRequest
{
    const TITLE_MIN_LENGTH = 6;
    const TITLE_MAX_LENGTH = 20;
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
            'name' => [
                'sometimes',
                'string'
            ],
            'email' => [
                'required',
                'email',
                'unique:users'
            ],
            'password' => [
                'required',
                'string'
            ]
        ];
    }
}
