<?php

namespace Mods\Blog\Category;

use Mods\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');


        \Mods\Blog\Models\Post::macro('categories', function(){
            return $this->belongsToMany(Category::class, 'category_blog_post');
        });

        \Mods\Blog\Models\Post::macro('categoriesCount', function(){
            return $this->categories()->count();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
