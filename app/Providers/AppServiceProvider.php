<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $randomPosts= Cache::remember('randomPosts', now()->addDays(2), function (){
            return Post::inRandomOrder()->limit(3)->get();
        });

        View::share('randomPosts', $randomPosts);
    }
}
