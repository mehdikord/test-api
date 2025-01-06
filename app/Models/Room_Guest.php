<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room_Guest extends Model
{
    protected $table='room_guests';
    protected $guarded=[];

    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class,'guest_id');
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class,'room_id');
    }
}
