<?php

namespace App\Providers;

use App\Models\Admin;
use App\Policies\RoomPolicy;
use App\Policies\RoomTypePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
    
        Gate::resource('room', RoomPolicy::class);
        Gate::resource('roomtype', RoomTypePolicy::class);
    }
}
