<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can list indexes', function () {
    Http::fake([
        '*/collections' => Http::response([], 200),
    ]);

    $collectionName = 'test-collection';
    $source = 'test-source';
    $response = Pinecone::createCollection($collectionName, $source);
    expect($response->status())->toEqual(200);

    $response = Pinecone::listCollections();
    expect($response->status())->toEqual(200);
});
