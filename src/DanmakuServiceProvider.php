<?php

namespace MoePlayer\Danmaku;

use Illuminate\Support\ServiceProvider;

class DanmakuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->app->make('MoePlayer\Danmaku\Controllers\DanmakuController');
        $this->publishes([
            __DIR__.'/../migrations/' => database_path('migrations')
        ], 'danmaku');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
