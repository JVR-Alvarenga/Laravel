<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Page;
use App\Models\Config;

class AppServiceProvider extends ServiceProvider {
    public function register(): void {
        
    }

    public function boot(): void {
        $frontMenu = [
            '/home' => 'Home',
        ];

        $pages = Page::all();
        foreach ($pages as $page) {
            $frontMenu[ $page['slug'] ] = $page['title'];
        }

        View::share('frontMenu', $frontMenu);

        $frontConfig = [];
        $configs = Config::all();
        
        foreach ($configs as $config) {
            $frontConfig[ $config['name'] ] = $config['content'];
        }

        View::share('frontConfig', $frontConfig);
    }
}
