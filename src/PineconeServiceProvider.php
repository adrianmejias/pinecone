<?php

namespace AdrianMejias\Pinecone;

use Illuminate\Support\ServiceProvider;
use AdrianMejias\Pinecone\Contracts\PineconeContract;

class PineconeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/pinecone.php' => config_path('pinecone.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/pinecone.php',
            'pinecone'
        );

        $this->app->singleton(PineconeContract::class, function ($app) {
            return new Pinecone($app['config']);
        });

        $this->app->alias(PineconeContract::class, 'pinecone');
    }
}
