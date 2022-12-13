<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingSeatUpdateRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "passenger"=>["required", "integer"],
            "seat"=>["required", "string"],
            "type"=>["required", "string"],
        ];
    }
}
