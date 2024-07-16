<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

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
        setlocale(LC_TIME, config('app.locale'));
        Carbon::setLocale(config('app.locale'));

        LogViewer::auth(function ($request) {
            // return true to allow viewing the Log Viewer.
            $user = $request->user();
            
            if ($user === null || ! in_array($user->email, ['admin@example.com'])) {
                return false;
            }

            return true;
        });
    }
}
