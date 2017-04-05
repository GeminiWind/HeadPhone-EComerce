<?php

namespace App\Providers;
use App\Models\Category;
use View;

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

        View::composer('*', function ($view) {
            $all_categories = Category::all();
            $view->with('all_categories', $all_categories);
        });
       
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
}
