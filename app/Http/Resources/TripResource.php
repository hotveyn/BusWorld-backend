<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "trip_id" => $this->id,
            "trip_code" => $this->trip_code,
            "from" =>
                [
                   "city" => $this->from->city,
                   "station" => $this->from->station,
                   "code" => $this->from->code,
//                    "date" => $request->date1, объясню потом почем закомментировал
                    "time" => $this->time_from
                ],
            "to" =>
                [
                    "city" => $this->to->city,
                    "station" => $this->to->station,
                    "code" => $this->to->code,
//                    "date" => $request->date1,
                    "time" => $this->time_to
                ],
            "cost" => $this->cost,
            "availability" => 156
        ];
    }
}
