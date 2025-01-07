<?php

namespace App\Http\Controllers\Rooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rooms\RoomCreateRequest;
use App\Http\Requests\Rooms\RoomGuestsCreateRequest;
use App\Interfaces\Rooms\RoomInterface;
use App\Models\Room;
use App\Models\Room_Guest;

class RoomController extends Controller
{
    protected RoomInterface $repository;

    public function __construct(RoomInterface $room)
    {
        $this->repository = $room;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->repository->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomCreateRequest $request)
    {
        return $this->repository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return $this->repository->show($room);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomCreateRequest $request, Room $room)
    {
        return $this->repository->update($request,$room);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        return $this->repository->destroy($room);

    }

    public function guests_index(Room $room)
    {
        return $this->repository->guests_index($room);
    }

    public function guests_store(RoomGuestsCreateRequest $request,Room $room)
    {
        return $this->repository->guests_store($request,$room);

    }

    public function guests_delete(Room $room,Room_Guest $guest)
    {
        return $this->repository->guests_destroy($room,$guest);
    }


}
