<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        //
        Schema::defaultStringLength(191);
        
        Blade::directive( 'moneda' , function ( $amount ) {
            if( is_numeric( $amount ) || is_double( $amount ) || is_float( $amount ) ) {
                return "<?php echo '$' . number_format( $amount , 2 ); ?>";
            } else {
                return $amount;
            }
        });
    }
}
