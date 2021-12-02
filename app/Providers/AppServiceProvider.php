<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('money', function ($money) {
            return "<?php echo number_format($money, 0); ?>";
        });
        Blade::directive('md5', function ($str) {
            return "<?php echo md5($str); ?>";
        });
        Blade::directive('strtoupper', function ($str) {
            return "<?php echo strtoupper($str); ?>";
        });
    }
}
