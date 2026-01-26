<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Project;
use App\Models\SiteSetting;

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
        // Share site setting and latest projects with all views
        View::composer('*', function ($view) {
            $siteSetting = SiteSetting::first();
            $latestProjects = Project::with(['projectImages', 'projectCategory'])
                ->orderBy('created_at', 'desc')
                ->take(6)
                ->get();
            
            $view->with(compact('siteSetting', 'latestProjects'));
        });
    }
}
