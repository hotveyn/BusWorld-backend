<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            "code" => $this->code,
            "trips" => [
                $this->mergeWhen(true, [TripResource::make($this->tripFrom), TripResource::make($this->tripBack)])
            ],
            "passengers" => PassangerResource::collection($this->passengers)
        ];
    }
}
