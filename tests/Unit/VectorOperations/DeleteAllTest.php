<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can delete all', function () {
    Http::fake([
        '*/vectors/delete' => Http::response([], 200),
    ]);

    $ids = ['test-id-1', 'test-id-2'];
    $filters = ['test-filter-1', 'test-filter-2'];
    $response = Pinecone::deleteAll($ids, $filters);
    expect($response->status())->toEqual(200);
});
