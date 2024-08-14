<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DB::listen(function ($query) {
            Log::info($query->sql);
            Log::info($query->bindings);
            Log::info($query->time);
        });

    }
}

        // DB::table('students')
        //     ->join('phones', 'phones.id', '=', 'students.phone_id')
        //     ->where('students.id', '=', 1)
        //     ->first()
    

    // });
