<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can delete an collection', function () {
    Http::fake([
        '*/collections' => Http::response('string', 201),
        '*/collections/*' => Http::response([], 200),
    ]);

    $collectionName = 'test-collection';
    $source = 'test-source';
    $response = Pinecone::collection($collectionName)->create($source);

    $response = Pinecone::collection($collectionName)->delete();
    expect($response->status())->toEqual(200);
});
