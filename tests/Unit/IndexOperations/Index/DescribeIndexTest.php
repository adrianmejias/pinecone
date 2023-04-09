<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can delete an index', function () {
    Http::fake([
        '*/databases' => Http::response('string', 201),
        '*/databases/*' => Http::response([
            'ddatabase' => [
                'name' => 'string',
                'dimension' => 'string',
                'metric' => 'string',
                'pods' => 0,
                'replicas' => 0,
                'shards' => 0,
                'pod_type' => 'string',
                'index_config' => [
                    'k_bits' => 512,
                    'hybrid' => false,
                ],
                'metadata_config' => [],
                'status' => [
                    'ready' => true,
                    'state' => 'Initializing',
                ],
            ],
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

    $response = Pinecone::index($indexName)->describe();
    expect($response->status())->toEqual(200);
});
