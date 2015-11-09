<?php

namespace Laravel5Fundatmentals\Providers;

use Laravel5Fundatmentals\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     *
     */
    public function composeNavigation()
    {
        /*view()->composer('partials.nav', function ($view) {
            $view->with('latest', Article::latest()->first());
        });*/

        // another way
        view()->composer('partials.nav', 'Laravel5Fundatmentals\Http\Composers\NavigationComposer@compose');
    }
}
