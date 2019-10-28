<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

abstract class BaseRequest extends FormRequest
{
    const INT_32_MIN = 1;
    const INT_32_MAX = 2147483648;

    const ORDER_DEFAULT_LENGTH = 100;

    const WITH_DEFAULT_LENGTH = 100;

    const LIMIT_DEFAULT_MAX = 100;

    const TITLE_MIN_LENGTH = 1;
    const TITLE_MAX_LENGTH = 200;

    const DESCRIPTION_MIN_LENGTH = 1;
    const DESCRIPTION_MAX_LENGTH = 1000;

    public function rules()
    {
        return [];
    }

    /**
     * Get extra data for validation
     *
     * @return void
     */
    protected function getExtraDataForValidation()
    {
        // no default action
    }

    protected function failedValidation(Validator $validator)
    {

        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(
            [
                'error' => $errors,
                'status_code' => 422,
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
