<?php

namespace App\Http\Controllers;

use App\Http\Requests\StationSearchRequest;
use App\Http\Resources\StationResource;
use App\Http\Services\ResponseService;
use App\Models\Station;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StationController extends Controller
{
    public function search(StationSearchRequest $request): Response|Application|ResponseFactory
    {
        $searched =  "%" . strtolower($request->query('query')) . "%";
        $stations = Station::where("city", "like", $searched)->
        orWhere("station", "like", $searched)->get();
        return ResponseService::success(StationResource::collection($stations));
    }
}
