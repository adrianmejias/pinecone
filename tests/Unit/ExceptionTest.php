<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;
use AdrianMejias\Pinecone\Exceptions\PineconeException;

it('can throw an exception for bad response', function () {
    Http::fake([
        '*/indexes' => Http::response([], 500),
    ]);

    $indexName = 'test_index';
    $schema = [
        ['name' => 'field1', 'type' => 'float'],
        ['name' => 'field2', 'type' => 'int'],
    ];

    $response = Pinecone::createIndex($indexName, $schema);

    expect($response->status())->toEqual(500);
})
    ->throws(
        PineconeException::class
    );
