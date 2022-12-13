<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripSearchRequest;
use App\Http\Resources\TripResource;
use App\Models\Station;
use App\Models\Trip;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TripController extends Controller
{
    public function search(TripSearchRequest $request): Response|Application|ResponseFactory
    {
        $stationFrom = Station::where("code", $request->from)->first();
        $stationTo = Station::where("code", $request->to)->first();
        $tripTo = Trip::where("from_id", $stationFrom->id)->
        where("to_id", $stationTo->id)->get();

        if ($request->date2) {
            $tripBack = Trip::where("to_id", $stationFrom->id)->
            where("from_id", $stationTo->id)->get();
            return response([
                "trip_to" => TripResource::collection($tripTo),
                "trip_back" => TripResource::collection($tripBack)
            ]);
        }

        return response(["trip_to" => TripResource::collection($tripTo)]);
    }
}
