<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room_Status extends Model
{
    protected $table='room_statuses';
    protected $guarded=[];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class,'room_status_id');
    }
}
