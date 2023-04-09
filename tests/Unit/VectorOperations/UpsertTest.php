<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can upsert', function () {
    Http::fake([
        '*/vectors/upsert' => Http::response([
            'upsertedCount' => 2,
        ], 200),
    ]);

    $vectors = [
        [
            'id' => 'test-id-1',
        ], [
            'id' => 'test-id-2',
        ],
    ];
    $indexName = 'test-index';
    $response = Pinecone::vector($indexName)->upsert($vectors);
    expect($response->status())->toEqual(200);
});

it('can upsert with namespace', function () {
    Http::fake([
        '*/vectors/upsert' => Http::response([
            'upsertedCount' => 2,
        ], 200),
    ]);

    $vectors = [
        [
            'id' => 'test-id-1',
        ], [
            'id' => 'test-id-2',
        ],
    ];
    $indexName = 'test-index';
    $response = Pinecone::vector($indexName)->namespace('example-namespace')->upsert($vectors);
    expect($response->status())->toEqual(200);
});
