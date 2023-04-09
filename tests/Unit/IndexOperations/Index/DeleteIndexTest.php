<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can delete an index', function () {
    Http::fake([
        '*/databases' => Http::response([], 200),
        '*/databases/*' => Http::response([], 200),
    ]);

    $indexName = 'test-index';
    $dimension = 128;
    $options = [
        'metric' => 'cosine',
        'pods' => 1,
        'replicas' => 1,
        'pod_type' => 'p1.x1',
    ];
    $response = Pinecone::createIndex($indexName, $dimension, $options);
    expect($response->status())->toEqual(200);

    $response = Pinecone::deleteIndex($indexName);
    expect($response->status())->toEqual(200);
});
