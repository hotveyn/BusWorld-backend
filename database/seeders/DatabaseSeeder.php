<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Booking;
use App\Models\Passanger;
use App\Models\Station;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Station::factory(4)->create();
        Trip::factory(10)->create()->each(function (Trip $trip) {
            Booking::factory(1)->create([
                "trip_from" => $trip->id,
                "trip_back" => $trip->id !== 1 ? $trip->id - 1 : 4,
            ])->each(function (Booking $booking) {
                User::factory(1)->create()->each(function (User $user) use ($booking) {
                    Passanger::factory(1)->create([
                        "booking_id" => $booking->id,
                        "first_name" => $user->first_name,
                        "last_name" => $user->last_name,
                        "document_number" => $user->document_number
                    ]);
                });
            });
        });
    }
}
