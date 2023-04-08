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
 * @method static \Illuminate\Http\Client\Response request($method, $uri = '', $options = [])
 * @method static \Illuminate\Http\Client\Response createIndex(string $indexName, array $schema)
 * @method static \Illuminate\Http\Client\Response deleteIndex(string $indexName)
 * @method static \Illuminate\Http\Client\Response listIndexes()
 * @method static \Illuminate\Http\Client\Response getIndex(string $indexName)
 * @method static \Illuminate\Http\Client\Response query(string $indexName, array $query, array $options = [])
 * @method static \Illuminate\Http\Client\Response createCollection(string $collectionName, string $sourceIndex)
 * @method static \Illuminate\Http\Client\Response deleteCollection(string $collectionName)
 * @method static \Illuminate\Http\Client\Response describeCollection(string $collectionName)
 * @method static \Illuminate\Http\Client\Response listCollections()
 * @method static \Illuminate\Http\Client\Response upsert(string $indexName, array $vectors, string $namespace = null)
 * @method static \Illuminate\Http\Client\Response queryVector(string $indexName, array $vector, array $options = [], string $namespace = null)
 * @method static \Illuminate\Http\Client\Response update(string $indexName, string $vectorId, array $values, array $metadata = [], array $options = [], string $namespace = null)
 * @method static \Illuminate\Http\Client\Response fetch(string $indexName, array $ids, array $options = [], string $namespace = null)
 * @method static \Illuminate\Http\Client\Response delete(string $indexName, array $ids, array $options = [], string $namespace = null)
 * @method static \Illuminate\Http\Client\Response deleteAll(string $indexName, array $options = [], string $namespace = null)
 */
class Pinecone extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'pinecone';
    }
}
