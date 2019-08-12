<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Categorie;
use App\Admin;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('visiteur.header', function($view)
    {
        $view->with( 'categories', $categories = Categorie::with('formations')->get());
    });

    view()->composer('visiteur.master', function($view)
    {
        $view->with( 'reseaux', $reseaux = Admin::first());
    });

    }

    //


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
