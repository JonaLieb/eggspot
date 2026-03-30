<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.navigation', function ($view) {
            $cart = session('cart', []);
            $cartCount = collect($cart)->sum('quantity');
            $cartTotal = collect($cart)->sum('line_total');
            $view->with('cartCount', $cartCount);
            $view->with('cartTotal', $cartTotal);
        });
    }
}
