<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can fetch', function () {
    Http::fake([
        '*/vectors/fetch?*' => Http::response([
            'vectors' => [
                'additionalProp' => [
                    'id' => 'example-vector-1',
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

    $ids = ['test-id-1', 'test-id-2'];
    $indexName = 'test-index';
    $response = Pinecone::vector($indexName)->fetch($ids);
    expect($response->status())->toEqual(200);
});

it('can fetch with namespace', function () {
    Http::fake([
        '*/vectors/fetch?*' => Http::response([
            'vectors' => [
                'additionalProp' => [
                    'id' => 'example-vector-1',
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

    $ids = ['test-id-1', 'test-id-2'];
    $indexName = 'test-index';
    $response = Pinecone::vector($indexName)->namespace('example-namespace')->fetch($ids);
    expect($response->status())->toEqual(200);
});
