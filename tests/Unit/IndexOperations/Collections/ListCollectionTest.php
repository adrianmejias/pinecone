<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can list indexes', function () {
    Http::fake([
        '*/collections' => Http::response([
            'string',
        ], 200),
    ]);

    $collectionName = 'test-collection';
    $source = 'test-source';
    $response = Pinecone::collection($collectionName)->create($source);

    $response = Pinecone::collection()->list();
    expect($response->status())->toEqual(200);
});
