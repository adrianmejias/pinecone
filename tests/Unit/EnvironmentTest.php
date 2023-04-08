<?php

use AdrianMejias\Pinecone\Facades\Pinecone;

it('can set an environment', function () {
    Pinecone::setEnvironment('test_environment');
    $environment = Pinecone::getEnvironment();

    expect($environment)->toEqual('test_environment');
});
