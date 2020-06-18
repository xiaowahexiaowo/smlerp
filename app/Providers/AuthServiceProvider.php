<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
		 \App\Models\Instockdetail::class => \App\Policies\InstockdetailPolicy::class,
		 \App\Models\Instock::class => \App\Policies\InstockPolicy::class,
		 \App\Models\Stock::class => \App\Policies\StockPolicy::class,
		 \App\Models\Receivable::class => \App\Policies\ReceivablePolicy::class,
		 \App\Models\Collected::class => \App\Policies\CollectedPolicy::class,
		 \App\Models\Order::class => \App\Policies\OrderPolicy::class,
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
