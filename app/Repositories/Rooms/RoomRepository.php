<?php

namespace App\Repositories\Rooms;
use App\Http\Resources\Rooms\RoomIndexResource;
use App\Interfaces\Rooms\RoomInterface;
use App\Models\Room;

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


}
