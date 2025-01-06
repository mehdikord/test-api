<?php

namespace App\Providers;

use App\Interfaces\Guests\GuestInterface;
use App\Interfaces\Rooms\RoomInterface;
use App\Interfaces\Rooms\RoomStatusInterface;
use App\Repositories\Guests\GuestRepository;
use App\Repositories\Rooms\RoomRepository;
use App\Repositories\Rooms\RoomStatusRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GuestInterface::class,GuestRepository::class);
        $this->app->bind(RoomStatusInterface::class,RoomStatusRepository::class);
        $this->app->bind(RoomInterface::class,RoomRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
