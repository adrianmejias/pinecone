<?php

namespace AdrianMejias\Pinecone\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Support\Facades\Http as HttpFacade;
use AdrianMejias\Pinecone\PineconeServiceProvider;
use AdrianMejias\Pinecone\Facades\Pinecone as PineconeFacade;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            PineconeServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Pinecone' => PineconeFacade::class,
            'Http' => HttpFacade::class,
        ];
    }
}
