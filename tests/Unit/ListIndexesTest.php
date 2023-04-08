<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

it('can list indexes', function () {
    Http::fake([
        '*/indexes' => Http::response([], 200),
    ]);

    $response = Pinecone::listIndexes();
    expect($response->status())->toEqual(200);
});
