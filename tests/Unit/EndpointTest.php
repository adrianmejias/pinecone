<?php

use AdrianMejias\Pinecone\Facades\Pinecone;

it('can set an endpoint', function () {
    Pinecone::setEndpoint('test_endpoint');
    $endpoint = Pinecone::getEndpoint();

    expect($endpoint)->toEqual('test_endpoint');
});
