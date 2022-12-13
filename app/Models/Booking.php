<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tripFrom()
    {
        return $this->belongsTo(Trip::class, "trip_from");
    }
    public function tripTo()
    {
        return $this->belongsTo(Trip::class, "trip_to");
    }
}
