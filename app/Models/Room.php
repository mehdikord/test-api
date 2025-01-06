<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    protected $table='rooms';
    protected $guarded=[];

    public function guests(): HasMany
    {
        return $this->hasMany(Room_Guest::class,'room_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Room_Status::class,'room_status_id');
    }
}
