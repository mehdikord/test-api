<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Guest extends Model
{
    protected $table='guests';
    protected $guarded=[];

    public function room(): HasOne
    {
        return $this->hasOne(Room_Guest::class,'guest_id');
    }
}
