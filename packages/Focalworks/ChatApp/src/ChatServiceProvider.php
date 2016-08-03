<?php

namespace Focalworks\ChatApp;

use Illuminate\Support\ServiceProvider;

class ChatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('Chat', function ($app) {
            return new Chat;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        include __DIR__ . '/routes.php';
//        $this->app->make('Focalworks\ChatApp\Controller\ChatController');

        // loading the routes from the routes file.
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/Http/routes.php';
        }

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'chat');

        // publishing the migrations
//        $this->publishes([
//            __DIR__ . '/../database/migrations/2015_07_15_095544_create_version_info_table.php' => base_path('database/migrations/2015_07_15_095544_create_version_info_table.php'),
//            __DIR__ . '/../assets' => public_path('assets'),
//            __DIR__ . '/config/audit.php' => config_path('audit.php')
//        ]);
    }
}
