<?php

use AdrianMejias\Pinecone\Facades\Pinecone;

it('can set an api key', function () {
    Pinecone::setApiKey('test_api_key');
    $apiKey = Pinecone::getApiKey();

    expect($apiKey)->toEqual('test_api_key');
});
