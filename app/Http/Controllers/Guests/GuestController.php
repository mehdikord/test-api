<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use App\Interfaces\Guests\GuestInterface;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    protected GuestInterface $repository;

    public function __construct(GuestInterface $guest)
    {
        $this->repository = $guest;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->repository->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        return $this->repository->show($guest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guest $guest)
    {
        return $this->repository->update($request,$guest);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        return $this->repository->destroy($guest);

    }
}
