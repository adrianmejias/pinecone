<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;
use AdrianMejias\Pinecone\Exceptions\PineconeException;

it('can throw an exception for bad response', function () {
    Http::fake([
        '*/databases' => Http::response([], 500),
    ]);

    $indexName = 'test_index'; // bad index name
    $dimension = 128;
    $response = Pinecone::index($indexName)->create($dimension);
    expect($response->status())->toEqual(500);
})
    ->throws(
        PineconeException::class
    );
