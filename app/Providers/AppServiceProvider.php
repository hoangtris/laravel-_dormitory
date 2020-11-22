<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('layouts.client',function($view){
            $user = User::find(1);
            $view->with('user',$user);
        });
    }
}
