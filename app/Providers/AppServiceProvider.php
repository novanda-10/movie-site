<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
// for this errrrrrrrroes

        // (index):14 Mixed Content: The page at 'https://laraveldockertest.onrender.com/' was loaded over HTTPS, but requested an insecure stylesheet 'http://laraveldockertest.onrender.com/build/assets/app-63hf7ZBF.css'. This request has been blocked; the content must be served over HTTPS. (index):14 Mixed Content: The page at 'https://laraveldockertest.onrender.com/' was loaded over HTTPS, but requested an insecure script
    }
}
