<?php

namespace App\Http\Resources\Rooms;

use App\Http\Resources\Guests\GuestIndexResource;
use App\Http\Resources\Rooms\RoomStatusIndexResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $name
 * @property mixed $email
 * @property mixed $profile
 * @property mixed $config
 */
class RoomGuestsIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'guest_id' => $this->guest_id,
            'room_id' => $this->room_id,
            'reservation_at' => $this->reservation_at,
            'enter_at' => $this->enter_at,
            'exit_at' => $this->exit_at,
            'description' => $this->description,
            'is_out' => $this->is_out,
            'guest' => new GuestIndexResource($this->guest),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
