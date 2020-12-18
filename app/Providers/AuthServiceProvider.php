<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('Admin', function ($user) {
            return $user->id_role == 1;
        });
        Gate::define('RoomManager', function ($user) {
            return $user->id_role == 2;
        });
        Gate::define('Cashier', function ($user) {
            return $user->id_role == 3;
        });
        Gate::define('Customer', function ($user) {
            return $user->id_role == 4;
        });
    }
}
