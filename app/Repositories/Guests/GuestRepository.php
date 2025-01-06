<?php

namespace App\Repositories\Guests;
use App\Http\Resources\Guests\GuestIndexResource;
use App\Interfaces\Guests\GuestInterface;
use App\Models\Guest;

class GuestRepository implements GuestInterface
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        //Start query
        $data = Guest::query();
        //Sorting data
        $data->orderByDesc('id');
        //Fetch all data without pagination
        return helper_response_fetch(GuestIndexResource::collection($data->get()));
    }

    public function store($request): \Illuminate\Http\JsonResponse
    {
        $data = Guest::create($request->validated());
        return helper_response_fetch(new GuestIndexResource($data));
    }

    public function show($item): \Illuminate\Http\JsonResponse
    {
        return helper_response_fetch(new GuestIndexResource($item));    }

    public function update($request, $item): \Illuminate\Http\JsonResponse
    {
        $item->update($request->validated());
        return helper_response_fetch(new GuestIndexResource($item));
    }

    public function destroy($item): \Illuminate\Http\JsonResponse
    {
        $item->delete();
        return helper_response_deleted();
    }


}
