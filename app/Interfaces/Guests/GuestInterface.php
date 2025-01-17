<?php
namespace App\Interfaces\Guests;

interface GuestInterface
{
    public function index();

    public function store($request);

    public function show($item);

    public function update($request,$item);

    public function destroy($item);

}
