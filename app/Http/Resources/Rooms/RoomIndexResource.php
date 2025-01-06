<?php

namespace App\Http\Resources\Rooms;

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
class RoomIndexResource extends JsonResource
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
            'room_status_id' => $this->room_status_id,
            'title' => $this->title,
            'code' => $this->code,
            'description' => $this->description,
            'status' => new RoomStatusIndexResource($this->status),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
