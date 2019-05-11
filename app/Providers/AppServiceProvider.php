<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
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
        Schema::defaultStringLength(191);

        view()->composer(['inc.sidebar-right', 'posts.show'], function ($view) {

            $archives = \App\Post::archives();
            $tags = \App\Tag::pluck('name');

            $view->with(compact('archives', 'tags'));
            //$view->with('tags', \App\Tag::has('posts')->pluck('name'));
        });
    }
}
