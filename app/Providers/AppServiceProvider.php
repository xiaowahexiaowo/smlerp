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
         if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Schedule::observe(\App\Observers\ScheduleObserver::class);
		\App\Models\Blackboard::observe(\App\Observers\BlackboardObserver::class);
		\App\Models\Outstockdetail::observe(\App\Observers\OutstockdetailObserver::class);
		\App\Models\Outstock::observe(\App\Observers\OutstockObserver::class);
		\App\Models\Instockdetail::observe(\App\Observers\InstockdetailObserver::class);
		\App\Models\Instock::observe(\App\Observers\InstockObserver::class);
		\App\Models\Stock::observe(\App\Observers\StockObserver::class);
		\App\Models\Receivable::observe(\App\Observers\ReceivableObserver::class);
		\App\Models\Collected::observe(\App\Observers\CollectedObserver::class);
		\App\Models\Order::observe(\App\Observers\OrderObserver::class);
        \App\Models\Orderdetail::observe(\App\Observers\OrderdetailObserver::class);


        //
    }
}
