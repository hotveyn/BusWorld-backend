<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseFormRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response(
            [
                "status" => 422,
                "success" => false,
                "message" => "validated error",
                "data" => $validator->errors(),
                "time" => Carbon::now()
            ], 422));
    }
}