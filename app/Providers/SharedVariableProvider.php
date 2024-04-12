<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Property;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SharedVariableProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer("*", function ($view){
            $categories = Category::with("properties")
                            ->get()
                            ->sort(function ($left, $right){
                                return $right->properties->count() - $left->properties->count();
                            });
            $view->with("categories", $categories);
        });
    }
}
