<?php

namespace App\Providers;

use App\Http\DatabaseSessionHandler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class SessionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Session::extend('database',function(){
           return new DatabaseSessionHandler(
             DB::connection(config('session_connection')),
             config('session.table'),
             config('session.lifetime'),
             $this->app
           );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
