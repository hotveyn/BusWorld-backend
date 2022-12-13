<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "first_name" => ["required", "string"],
            "last_name" => ["required", "string"],
            "phone" => ["required", "string"],
            "document_number" => ["required", "string"],
            "password" => ["required", "string"],
        ];
    }
}
