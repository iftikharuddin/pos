<?php

namespace App\Providers;

use \Auth;;

use Illuminate\Support\ServiceProvider;

use App\Setting;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
          $company = Setting::find(1);
		  view()->share('company', $company);
		

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
