<?php

namespace AdrianMejias\Pinecone\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AdrianMejias\Pinecone\Pinecone
 * @method static \AdrianMejias\Pinecone\Pinecone setApiKey(string $apiKey)
 * @method static \AdrianMejias\Pinecone\Pinecone setEnvironment(string $environment)
 * @method static \AdrianMejias\Pinecone\Pinecone setProjectId(string $projectId)
 * @method static \AdrianMejias\Pinecone\Pinecone setEndpoint(string $endpoint)
 * @method static string getApiKey()
 * @method static string getEnvironment()
 * @method static string getProjectId()
 * @method static string getEndpoint()
 * @method static \Illuminate\Http\Client\Response request(string $method, string $uri = '', ?array $options = [])
 * @method static \AdrianMejias\Pinecone\PineconeVector vector(string $indexName)
 * @method static \AdrianMejias\Pinecone\PineconeIndex index(?string $indexName = null)
 * @method static \AdrianMejias\Pinecone\PineconeCollection collection(?string $collectionName = null)
 */
class Pinecone extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'pinecone';
    }
}
