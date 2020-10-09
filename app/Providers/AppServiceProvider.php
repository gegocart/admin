<?php

namespace App\Providers;

use App\Cart\Cart;
use App\Cart\Payments\Gateway;
use App\Cart\Payments\Gateways\StripeGateway;
use Illuminate\Support\ServiceProvider;
use Stripe\Stripe;
use App\Models\Store;
use App\Observers\RatingReviewObserver;
use App\Models\RatingReview;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Stripe::setApiKey(config('services.stripe.secret'));

        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            // Ignores notices and reports all other kinds... and warnings
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
            // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
        }

        RatingReview::observe(RatingReviewObserver::class); 
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Cart::class, function ($app) {
            if ($app->auth->user()) {
                $app->auth->user()->load([
                    'cart.stock'
                ]);
            }

            return new Cart($app->auth->user());
        });

        $this->app->singleton(Gateway::class, function () {
            return new StripeGateway();
        });
    }
}
