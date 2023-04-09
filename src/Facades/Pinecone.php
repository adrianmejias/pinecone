<?php

namespace AdrianMejias\Pinecone\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AdrianMejias\Pinecone\Pinecone
 * @method static \AdrianMejias\Pinecone\Pinecone setApiKey(string $apiKey)
 * @method static \AdrianMejias\Pinecone\Pinecone setEnvironment(string $environment)
 * @method static \AdrianMejias\Pinecone\Pinecone setEndpoint(string $endpoint)
 * @method static string getApiKey()
 * @method static string getEnvironment()
 * @method static string getEndpoint()
 * @method static \Illuminate\Http\Client\Response request(string $method, string $uri = '', ?array $options = [])
 * @method static \AdrianMejias\Pinecone\Pinecone namespace(string $namespace)
 * @method static \Illuminate\Http\Client\Response createIndex(string $indexName, int $dimension, ?array $options = [])
 * @method static \Illuminate\Http\Client\Response deleteIndex(string $indexName)
 * @method static \Illuminate\Http\Client\Response listIndexes()
 * @method static \Illuminate\Http\Client\Response describeIndex(string $indexName)
 * @method static \Illuminate\Http\Client\Response configureIndex(string $indexName, ?array $options = [])
 * @method static \Illuminate\Http\Client\Response createCollection(string $collectionName, string $sourceIndex)
 * @method static \Illuminate\Http\Client\Response deleteCollection(string $collectionName)
 * @method static \Illuminate\Http\Client\Response describeCollection(string $collectionName)
 * @method static \Illuminate\Http\Client\Response listCollections()
 * @method static \Illuminate\Http\Client\Response describeIndexStats(?array $filter = [])
 * @method static \Illuminate\Http\Client\Response query(int $topK, ?array $options = [])
 * @method static \Illuminate\Http\Client\Response delete(?array $ids = [], ?array $filters = [])
 * @method static \Illuminate\Http\Client\Response deleteAll(?array $ids = [], ?array $filters = [])
 * @method static \Illuminate\Http\Client\Response fetch(array $ids)
 * @method static \Illuminate\Http\Client\Response update(string $id, ?array $options = [])
 * @method static \Illuminate\Http\Client\Response upsert(array $vectors)
 */
class Pinecone extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'pinecone';
    }
}
