<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can query', function () {
    Http::fake([
        '*/query' => Http::response([
            'matches' => [
                [
                    'id' => 'example-vector-1',
                    'score' => 0.08,
                    'values' => [
                        0.1,
                        0.2,
                        0.3,
                        0.4,
                        0.5,
                        0.6,
                        0.7,
                        0.8,
                    ],
                    'sparseValues' => [
                        'indices' => [
                            1,
                            312,
                            822,
                            14,
                            980,
                        ],
                        'values' => [
                            0.1,
                            0.2,
                            0.3,
                            0.4,
                            0.5,
                        ],
                    ],
                    'metadata' => [
                        'genre' => 'documentary',
                        'year' => 2019,
                    ],
                ],
            ],
            'namespace' => '',
        ], 200),
    ]);

    $topK = 10;
    $options = [
        'query' => [
            'vectors' => [
                [
                    'id' => 'test-id',
                    'vector' => [0.1, 0.2, 0.3],
                ],
            ],
        ],
    ];
    $indexName = 'test-index';
    $response = Pinecone::vector($indexName)->query($topK, $options);
    expect($response->status())->toEqual(200);
});

it('can query with namespace', function () {
    Http::fake([
        '*/query' => Http::response([
            'matches' => [
                [
                    'id' => 'example-vector-1',
                    'score' => 0.08,
                    'values' => [
                        0.1,
                        0.2,
                        0.3,
                        0.4,
                        0.5,
                        0.6,
                        0.7,
                        0.8,
                    ],
                    'sparseValues' => [
                        'indices' => [
                            1,
                            312,
                            822,
                            14,
                            980,
                        ],
                        'values' => [
                            0.1,
                            0.2,
                            0.3,
                            0.4,
                            0.5,
                        ],
                    ],
                    'metadata' => [
                        'genre' => 'documentary',
                        'year' => 2019,
                    ],
                ],
            ],
            'namespace' => 'example-namespace',
        ], 200),
    ]);

    $topK = 10;
    $options = [
        'query' => [
            'vectors' => [
                [
                    'id' => 'test-id',
                    'vector' => [0.1, 0.2, 0.3],
                ],
            ],
        ],
    ];
    $indexName = 'test-index';
    $response = Pinecone::vector($indexName)->namespace('example-namespace')->query($topK, $options);
    expect($response->status())->toEqual(200);
});
