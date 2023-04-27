<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


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

        $data = DB::table('websites')->first();
        $currency = $data->currency;
        $points_per_currency = $data->points_per_currency;
        $points_for_referrer =$data->points_for_referrer;
        $points_for_refercode_user = $data->points_for_refercode_user;
        View::share(['currency'=>$currency,'points_per_currency'=>$points_per_currency,'points_for_referrer'=>$points_for_referrer,'points_for_refercode_user'=>$points_for_refercode_user]);

        Schema::defaultStringLength(191);
    }
}
