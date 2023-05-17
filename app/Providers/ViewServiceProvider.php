<?php

namespace App\Providers;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Categories
        View::composer(['categories.fields'], function ($view) {
            $categories = Category::orderBy('name')->pluck('name', 'id')->toArray();
            $view->with('allCategories', $categories);
        });

    }
}
