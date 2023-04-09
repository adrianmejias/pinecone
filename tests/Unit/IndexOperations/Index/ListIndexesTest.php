<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can list indexes', function () {
    Http::fake([
        '*/databases' => Http::response([
            'string',
        ], 200),
    ]);

    $indexName = 'test-index';
    $dimension = 128;
    $options = [
        'metric' => 'cosine',
        'pods' => 1,
        'replicas' => 1,
        'pod_type' => 'p1.x1',
    ];
    $response = Pinecone::index($indexName)->create($dimension, $options);

    $response = Pinecone::index()->list();
    expect($response->status())->toEqual(200);
});
