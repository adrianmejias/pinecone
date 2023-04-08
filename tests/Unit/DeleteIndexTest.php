<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can delete an index', function () {
    Http::fake([
        '*/indexes' => Http::response([], 200),
        '*/indexes/*' => Http::response([], 200),
    ]);

    // Test creating an index
    $indexName = 'test_index';
    $schema = [
        ['name' => 'field1', 'type' => 'float'],
        ['name' => 'field2', 'type' => 'int'],
    ];
    $response = Pinecone::createIndex($indexName, $schema);
    expect($response->status())->toEqual(200);

    // Test deleting an index
    $response = Pinecone::deleteIndex($indexName);
    expect($response->status())->toEqual(200);
});
