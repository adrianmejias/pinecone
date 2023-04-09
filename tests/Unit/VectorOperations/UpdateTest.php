<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can update', function () {
    Http::fake([
        '*/vectors/update' => Http::response([], 200),
    ]);

    $id = 'test-id';
    $indexName = 'test-index';
    $response = Pinecone::vector($indexName)->update($id);
    expect($response->status())->toEqual(200);
});

it('can update with namespace', function () {
    Http::fake([
        '*/vectors/update' => Http::response([], 200),
    ]);

    $id = 'test-id';
    $indexName = 'test-index';
    $response = Pinecone::vector($indexName)->namespace('example-namespace')->update($id);
    expect($response->status())->toEqual(200);
});
