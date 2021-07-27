<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        parent::__construct($app);
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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(CategoryRepository $categoryRepository)
    {
        $categoriesHierarchical = $categoryRepository->getCategoriesHierarchical();
        View::composer(['client.layouts.header'], function ($view) use ($categoriesHierarchical){
            $view->with('categoriesHierarchical', $categoriesHierarchical);
        });
    }
}
