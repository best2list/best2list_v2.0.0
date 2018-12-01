<?php

namespace App\Providers;

use App\Category;
use App\Country;
use App\Menu;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        //countries menu
        //$countries = Country::all();
        //Blade::directive('layouts.app')->with('countries',$countries);
        view()->composer('layouts.two-col.two-col', function ($view) {
            $view->with('countries', Country::all());
            $view->with('categories', Category::with('children')->whereNull('parent_id')->orderBy('title', 'asc')->get());
            $view->with('menus', Menu::where('status', 'active')->get());
        });
//
//        view()->composer('*', function($view) {
//            $view->with('search_categories', \App\Category::categories());
//            $view->with('categories_all', \App\Category::all());
//            $view->with('search_cities', \App\City::cities());
//
//            $view->with('countries_all', \App\Country::all());
//
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
