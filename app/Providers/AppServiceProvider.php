<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Genre;
use App\Country;
use Illuminate\Support\Facades\View;

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
        $genre = Genre::get();
        $country = Country::get();
        
        View::share('genre',$genre);
        View::share('country',$country);
    }
}
