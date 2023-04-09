<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can create an collection', function () {
    Http::fake([
        '*/collections' => Http::response('string', 201),
    ]);

    $collectionName = 'test-collection';
    $source = 'test-source';
    $response = Pinecone::collection($collectionName)->create($source);
    expect($response->status())->toEqual(201);
});
