<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tripFrom(): BelongsTo
    {
        return $this->belongsTo(Trip::class, "trip_from");
    }
    public function tripBack(): BelongsTo
    {
        return $this->belongsTo(Trip::class, "trip_back");
    }

    public function trips()
    {
        return $this->belongsTo(Trip::class);
    }
    public function passengers(): HasMany
    {
        return $this->hasMany(Passanger::class);
    }
}
