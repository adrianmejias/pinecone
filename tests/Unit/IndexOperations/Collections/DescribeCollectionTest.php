<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can delete a collection', function () {
    Http::fake([
        '*/collections' => Http::response('string', 201),
        '*/collections/*' => Http::response([
            'name' => 'example-collection',
            'size' => 1,
            'status' => 'created',
        ], 200),
    ]);

    $collectionName = 'test-collection';
    $source = 'test-source';
    $response = Pinecone::collection($collectionName)->create($source);

    $response = Pinecone::collection($collectionName)->describe();
    expect($response->status())->toEqual(200);
});
