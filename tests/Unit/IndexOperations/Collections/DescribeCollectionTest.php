<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can delete a collection', function () {
    Http::fake([
        '*/collections' => Http::response([], 200),
        '*/collections/*' => Http::response([], 200),
    ]);

    $collectionName = 'test-collection';
    $source = 'test-source';
    $response = Pinecone::createCollection($collectionName, $source);
    expect($response->status())->toEqual(200);

    $response = Pinecone::describeCollection($collectionName);
    expect($response->status())->toEqual(200);
});
