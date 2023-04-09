<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can describe index stats', function () {
    Http::fake([
        '*/describe_index_stats' => Http::response([
            'namespaces' => [
                'example-namespace' => [
                    'vectorCount' => 50000,
                ],
                'example-namespace-2' => [
                    'vectorCount' => 30000,
                ],
            ],
            'dimension' => 1024,
            'index_fullness' => 0.4,
        ], 200),
    ]);

    $response = Pinecone::describeIndexStats();
    expect($response->status())->toEqual(200);
});
