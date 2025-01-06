<?php

namespace App\Http\Controllers\Rooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rooms\RoomStatusCreateRequest;
use App\Http\Requests\Rooms\RoomStatusUpdateRequest;
use App\Interfaces\Rooms\RoomStatusInterface;
use App\Models\Room_Status;

class RoomStatusController extends Controller
{
    protected RoomStatusInterface $repository;

    public function __construct(RoomStatusInterface $room_status)
    {
        $this->repository = $room_status;
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
    public function store(RoomStatusCreateRequest $request)
    {
        return $this->repository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room_Status $status)
    {
        return $this->repository->show($status);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomStatusUpdateRequest $request, Room_Status $status)
    {
        return $this->repository->update($request,$status);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room_Status $status)
    {
        return $this->repository->destroy($status);

    }
}
