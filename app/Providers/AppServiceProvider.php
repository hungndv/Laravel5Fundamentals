<?php

namespace Laravel5Fundatmentals\Providers;

use Laravel5Fundatmentals\Article;
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
//        view()->composer('partials.nav', function($view){
//            $view->with('latest', Article::latest()->first());
//        });
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
