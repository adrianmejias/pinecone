<?php

use AdrianMejias\Pinecone\Facades\Pinecone;
use Illuminate\Support\Facades\Http;

// it('can create, list, and delete an index', function () {
//     Http::fake([
//         '*/indexes' => Http::response([], 200)
//     ]);

//     // Test creating an index
//     $indexName = 'test_index';
//     $schema = [
//         ['name' => 'field1', 'type' => 'float'],
//         ['name' => 'field2', 'type' => 'int'],
//     ];
//     $response = $this->pinecone->createIndex($indexName, $schema);
//     expect($response->status())->toEqual(200);

//     // Test listing indexes
//     $response = $this->pinecone->listIndexes();
//     expect($response->status())->toEqual(200);
//     expect($response->json())->toContain($indexName);

//     // Test deleting an index
//     $response = $this->pinecone->deleteIndex($indexName);
//     expect($response->status())->toEqual(200);
// });
