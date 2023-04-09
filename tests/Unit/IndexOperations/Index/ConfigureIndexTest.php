<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can configure an index', function () {
    Http::fake([
        '*/databases' => Http::response('string', 201),
        '*/databases/*' => Http::response('string', 202),
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

    $response = Pinecone::index($indexName)->configure();
    expect($response->status())->toEqual(202);
});
