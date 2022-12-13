<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function from(): BelongsTo
    {
        return $this->belongsTo(Station::class, "from_id");
    }

    public function to(): BelongsTo
    {
        return $this->belongsTo(Station::class, "to_id");
    }
}
