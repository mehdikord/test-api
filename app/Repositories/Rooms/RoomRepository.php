<?php

namespace App\Repositories\Rooms;
use App\Http\Resources\Rooms\RoomGuestsIndexResource;
use App\Http\Resources\Rooms\RoomIndexResource;
use App\Interfaces\Rooms\RoomInterface;
use App\Models\Room;
use Carbon\Carbon;

class RoomRepository implements RoomInterface
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        //Start query
        $data = Room::query();
        //Sorting data
        $data->orderByDesc('id');
        //Fetch all data without pagination
        return helper_response_fetch(RoomIndexResource::collection($data->get()));
    }

    public function store($request): \Illuminate\Http\JsonResponse
    {
        $data = Room::create($request->validated());
        //generate room unique code
        if ($data){
            $data->update(['code' => helper_core_code_generator($data->id,6)]);
        }
        return helper_response_fetch(new RoomIndexResource($data));
    }

    public function show($item): \Illuminate\Http\JsonResponse
    {
        return helper_response_fetch(new RoomIndexResource($item));    }

    public function update($request, $item): \Illuminate\Http\JsonResponse
    {
        $item->update($request->validated());
        return helper_response_fetch(new RoomIndexResource($item));
    }

    public function destroy($item): \Illuminate\Http\JsonResponse
    {
        $item->delete();
        return helper_response_deleted();
    }


    //get guests in this room
    public function guests_index($room): \Illuminate\Http\JsonResponse
    {
        $data = $room->guests()->where('is_out',false);
        $data->orderByDesc('updated_at');
        return helper_response_fetch(RoomGuestsIndexResource::collection($data->get()));

    }

    public function guests_store($request,$room): \Illuminate\Http\JsonResponse
    {
        //check room opacity
        if ($room->guests()->where('is_out',false)->count() + 1 > $room->capacity){
            return helper_response_error('The capacity of the room is full');
        }
        if ($room->guests()->where('guest_id',$request->guest_id)->where('is_out',false)->exists()){
            return helper_response_error('The guest already is in room !');
        }

        $data = $room->guests()->create([
            'guest_id' => $request->guest_id,
            'description' => $request->description,
            'enter_at' => Carbon::now(),
        ]);
        return helper_response_fetch(new RoomGuestsIndexResource($data));

    }

    public function guests_destroy($room,$guest): \Illuminate\Http\JsonResponse
    {
        $guest->update(['is_out' => true,'exit_at' => Carbon::now()]);
        return helper_response_deleted();
    }
}
