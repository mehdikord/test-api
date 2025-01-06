<?php

namespace App\Repositories\Rooms;
use App\Http\Resources\Rooms\RoomStatusIndexResource;
use App\Interfaces\Rooms\RoomStatusInterface;
use App\Models\Room_Status;

class RoomStatusRepository implements RoomStatusInterface
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        //Start query
        $data = Room_Status::query();
        //Sorting data
        $data->orderByDesc('id');
        //Fetch all data without pagination
        return helper_response_fetch(RoomStatusIndexResource::collection($data->get()));
    }

    public function store($request): \Illuminate\Http\JsonResponse
    {
        $data = Room_Status::create($request->validated());
        return helper_response_fetch(new RoomStatusIndexResource($data));
    }

    public function show($item): \Illuminate\Http\JsonResponse
    {
        return helper_response_fetch(new RoomStatusIndexResource($item));    }

    public function update($request, $item): \Illuminate\Http\JsonResponse
    {
        $item->update($request->validated());
        return helper_response_fetch(new RoomStatusIndexResource($item));
    }

    public function destroy($item): \Illuminate\Http\JsonResponse
    {
        $item->delete();
        return helper_response_deleted();
    }


}
