<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\ServiceProvider;
use View;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $categoryList = Category::orderBy('name')->get();
            $view->with('categoryList', $categoryList);
        });
        View::composer('*', function ($view) {
            $brandList = Brand::orderBy('name')->get();
            $view->with('brandList', $brandList);
        });
        View::composer('*', function ($view) {
            $hotProducts = Product::hot()->orderBy('name')->paginate(4);;
            $view->with('hotProducts', $hotProducts);
        });
          View::composer('*', function ($view) {
            $newProducts = Product::latest()->orderBy('name')->paginate(4);;
            $view->with('newProducts', $newProducts);
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
