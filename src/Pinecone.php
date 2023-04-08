<?php

namespace AdrianMejias\Pinecone;

use Illuminate\Support\Facades\Http;
use Illuminate\Config\Repository as Config;
use AdrianMejias\Pinecone\Contracts\PineconeContract;
use AdrianMejias\Pinecone\Exceptions\PineconeException;

class Pinecone implements PineconeContract
{
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function setApiKey(string $apiKey)
    {
        $this->config->set('pinecone.api_key', $apiKey);

        return $this;
    }

    public function setEnvironment(string $environment)
    {
        $this->config->set('pinecone.environment', $environment);

        return $this;
    }

    public function setEndpoint(string $endpoint)
    {
        $this->config->set('pinecone.controller_host', $endpoint);

        return $this;
    }

    public function getApiKey()
    {
        return $this->config->get('pinecone.api_key');
    }

    public function getEnvironment()
    {
        return $this->config->get('pinecone.environment');
    }

    public function getEndpoint()
    {
        return $this->config->get('pinecone.controller_host');
    }

    public function request($method, $uri = '', $options = [])
    {
        $headers = [
            'Authorization' => 'Bearer ' . $this->config->get('pinecone.api_key'),
            'Content-Type' => 'application/json',
            'X-Pinecone-Environment' => $this->config->get('pinecone.environment'),
        ];

        $options['headers'] = array_merge($options['headers'] ?? [], $headers);
        
        $url = $this->config->get('pinecone.controller_host') . $uri;

        return Http::withHeaders(
            $options['headers']
        )->$method($url, $options['json'] ?? [])
            ->throw(function ($response, $exception) {
                throw new PineconeException(
                    $response->json(),
                    $exception->getCode(),
                    $exception
                );
            });
    }

    public function createIndex(string $indexName, array $schema)
    {
        $createIndexRequest = [
            'name' => $indexName,
            'schema' => $schema,
        ];

        return $this->request('post', '/indexes', [
            'json' => $createIndexRequest
        ]);
    }

    public function deleteIndex(string $indexName)
    {
        return $this->request('delete', "/indexes/{$indexName}");
    }

    public function listIndexes()
    {
        return $this->request('get', '/indexes');
    }

    public function getIndex(string $indexName)
    {
        return $this->request('get', "/indexes/{$indexName}");
    }

    public function query(string $indexName, array $query, array $options = [])
    {
        $queryRequest = [
            'query' => $query,
            'options' => $options,
        ];

        return $this->request('post', "/indexes/{$indexName}/query", [
            'json' => $queryRequest
        ]);
    }

    public function createCollection(string $collectionName, string $sourceIndex)
    {
        $createCollectionRequest = [
            'name' => $collectionName,
            'source_index' => $sourceIndex,
        ];

        return $this->request('post', '/collections', [
            'json' => $createCollectionRequest
        ]);
    }

    public function deleteCollection(string $collectionName)
    {
        return $this->request('delete', "/collections/{$collectionName}");
    }

    public function describeCollection(string $collectionName)
    {
        return $this->request('get', "/collections/{$collectionName}");
    }

    public function listCollections()
    {
        return $this->request('get', '/collections');
    }

    public function upsert(string $indexName, array $vectors, string $namespace = null)
    {
        $upsertRequest = [
            'vectors' => $vectors,
            'namespace' => $namespace,
        ];

        return $this->request('post', "/indexes/{$indexName}/vectors", [
            'json' => $upsertRequest
        ]);
    }

    public function queryVector(string $indexName, array $vector, array $options = [], string $namespace = null)
    {
        $queryRequest = [
            'vector' => $vector,
            'options' => $options,
            'namespace' => $namespace,
        ];

        return $this->request('post', "/indexes/{$indexName}/query", [
            'json' => $queryRequest
        ]);
    }

    public function update(string $indexName, string $vectorId, array $values, array $metadata = [], array $options = [], string $namespace = null)
    {
        $updateRequest = [
            'values' => $values,
            'metadata' => $metadata,
            'options' => $options,
            'namespace' => $namespace,
        ];

        return $this->request('put', "/indexes/{$indexName}/vectors/{$vectorId}", [
            'json' => $updateRequest
        ]);
    }

    public function fetch(string $indexName, array $ids, array $options = [], string $namespace = null)
    {
        $fetchRequest = [
            'ids' => $ids,
            'options' => $options,
            'namespace' => $namespace,
        ];

        return $this->request('post', "/indexes/{$indexName}/vectors/fetch", [
            'json' => $fetchRequest
        ]);
    }

    public function delete(string $indexName, array $ids, array $options = [], string $namespace = null)
    {
        $deleteRequest = [
            'ids' => $ids,
            'options' => $options,
            'namespace' => $namespace,
        ];

        return $this->request('post', "/indexes/{$indexName}/vectors/delete", [
            'json' => $deleteRequest
        ]);
    }

    public function deleteAll(string $indexName, array $options = [], string $namespace = null)
    {
        $deleteAllRequest = [
            'options' => $options,
            'namespace' => $namespace,
        ];

        return $this->request('post', "/indexes/{$indexName}/vectors/delete_all", [
            'json' => $deleteAllRequest
        ]);
    }
}
