<?php

namespace App\Providers;

use DB;
use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //  @set($i,10)
        Blade::directive('set', function ($exp) {
            list($name, $val) = explode(',', $exp);

            return "<?php $name = $val ?>";
        });

        DB::listen(function ($query) {

            //echo '<h1>'.$query->sql.'</h1>';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
