<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingSeatUpdateRequest;
use App\Http\Requests\BookingStoreRequest;
use App\Http\Resources\BookingResource;
use App\Http\Resources\PassangerResource;
use App\Http\Resources\SeatResource;
use App\Http\Services\ResponseService;
use App\Models\Booking;
use App\Models\Passanger;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Booking $code)
    {
        return ResponseService::success(BookingResource::make($code));
    }

    public function indexSeat(Booking $code)
    {
        return ResponseService::success(SeatResource::make($code)
        );
    }

    public function update(BookingSeatUpdateRequest $request, Booking $code)
    {
        $passenger = $code->passengers->where("id", $request->passenger)->first();
        //todo: Я прекрасно понимаю что это можно сократить, но я уже пишу код 11-ый час
        if ($request->type === "from") {
            if ($code->passengers->where("place_from", $request->seat)->count() > 0) {
                return ResponseService::error(403, "Место занято");
            }
            $passenger->place_from = $request->seat;
            $passenger->save();
            return ResponseService::success(PassangerResource::make($passenger));
        } else if ($request->type === "back") {
            if ($code->passengers->where("place_back", $request->seat)->count() > 0) {
                return ResponseService::error(403, "Место занято");
            }
            $passenger->place_back = $request->seat;
            $passenger->save();
            return ResponseService::success(PassangerResource::make($passenger));
        }
        return ResponseService::error(422, "Неправильный тип места");
    }

    public function store(BookingStoreRequest $request)
    {
        //todo: Я прекрасно понимаю что тут возможно говнокод, но я уже пишу код 11-ый час
        $booking = Booking::factory(1)->create([
            "trip_from" => $request->trip_from["id"],
            "date_from" => $request->trip_from["date"],
            "trip_back" => $request->trip_back["id"],
            "date_back" => $request->trip_back["date"],
        ]);
        foreach ($request->passengers as $passenger) {
            Passanger::factory(1)->create([
                "booking_id" => $booking[0]->id,
                "first_name" => $passenger["first_name"],
                "last_name" => $passenger["last_name"],
                "birth_date" => $passenger["birth_date"],
                "document_number" => $passenger["document_number"],
            ]);
        }
        return ResponseService::success($booking[0]->code);
    }
}
