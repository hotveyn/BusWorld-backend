<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripSearchRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            "from" => ["required", "integer"],
            "to" => ["required", "integer"],
            "date1" => ["required", "date"],
            "date2" => ["date"],
            "passengers" => ["required", "integer", "min:1", "max:25"],

        ];
    }
}
