<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Address' => 'App\Policies\AddressPolicy',
        'App\Models\PayTM' => 'App\Policies\PayTMPolicy',
        'App\Models\Attribute' => 'App\Policies\AttributePolicy',
        'App\Models\AttributeProduct' => 'App\Policies\AttributeProductPolicy',
        'App\Models\Attributeset' => 'App\Policies\AttributesetPolicy',
        'App\Models\AttributesetCategory' => 'App\Policies\AttributesetCategoryPolicy',
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
