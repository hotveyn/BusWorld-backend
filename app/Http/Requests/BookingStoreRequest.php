<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
//            "trip_from"=>['required', 'array'],
            "trip_from.id" => ['required', "integer"],
            "trip_from.date" => ['required', "date"],
            "trip_back.id" => ['required', "integer"],
            "trip_back.date" => ['required', "date"],
            "passengers" => ['required', "array"],
            "passengers.*.first_name" => ['required', 'string'],
            "passengers.*.last_name" => ['required', 'string'],
            "passengers.*.birth_date" => ['required', 'date'],
            "passengers.*.document_number" => ['required', 'integer'],

//            "trip_back"=>['required', 'array'],
//            "trip_back.*.id" => ['required', "integer"],
//            "trip_back.*.date" => ['required', "date"],
        ];
    }
}
