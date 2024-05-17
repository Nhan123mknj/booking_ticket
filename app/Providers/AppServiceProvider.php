<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Genres;
use App\Models\Menu;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer(['*'], function ($view) {
            $genre=Genres::withCount('movies')->get();
            $view->with('genres', $genre);
        });
        View::composer(['*'], function ($view) {
            $menus = Menu::where('IsActive',1)->get();

            $view->with('menus', $menus);
        });
    }
}
