<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Entities\{Categories,Subcategories,MasterCategories};
use View;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
     
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       View::composer('*', function($view)
        {
            $MasterCategories = MasterCategories::get();
             $Subcategories = Subcategories::with(['category'])->latest()->get();
             $categories = Categories::with('masterCategory')->get();
            $view->with('MasterCategories',  $MasterCategories);
             $view->with('categories',  $categories);
              $view->with('Subcategories',  $Subcategories);
        });
    }
}
