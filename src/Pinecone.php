<?php

namespace AdrianMejias\Pinecone;

use Illuminate\Support\Facades\Http;
use Illuminate\Config\Repository as Config;
use AdrianMejias\Pinecone\Contracts\PineconeContract;
use AdrianMejias\Pinecone\Exceptions\PineconeException;
use Illuminate\Http\Client\Response;

class Pinecone implements PineconeContract
{
    /**
     * @var \Illuminate\Config\Repository
     */
    private $config;

    /**
     * @var string
     */
    private $namespace;

    /**
     * @param \Illuminate\Config\Repository $config
     */
    public function __construct(
        Config $config
    ) {
        $this->config = $config;
    }

    public function setApiKey(
        string $apiKey
    ): Pinecone {
        $this->config->set('pinecone.api_key', $apiKey);

        return $this;
    }

    public function setEnvironment(
        string $environment
    ): Pinecone {
        $this->config->set('pinecone.environment', $environment);

        return $this;
    }

    public function setEndpoint(
        string $endpoint
    ): Pinecone {
        $this->config->set('pinecone.controller_host', $endpoint);

        return $this;
    }

    public function getApiKey(): ?string
    {
        return $this->config->get('pinecone.api_key');
    }

    public function getEnvironment(): ?string
    {
        return $this->config->get('pinecone.environment');
    }

    public function getEndpoint(): ?string
    {
        return $this->config->get('pinecone.controller_host');
    }

    public function request(
        string $method,
        string $uri = '',
        ?array $options = []
    ): Response {
        return Http::withHeaders(
            array_merge($options['headers'] ?? [], [
                'Api-Key' => $this->config->get('pinecone.api_key'),
            ])
        )
            ->asJson()
            ->$method(
                $this->config->get('pinecone.controller_host') . '/' . ltrim($uri, '/'),
                $options['json'] ?? []
            )
            ->throw(function ($response, $exception) {
                throw new PineconeException(
                    $exception->getMessage(),
                    $exception->getCode(),
                    $exception
                );
            });
    }

    public function namespace(
        string $namespace
    ): Pinecone {
        $this->namespace = $namespace;

        return $this;
    }

    public function createIndex(
        string $indexName,
        int $dimension,
        ?array $options = []
    ): Response {
        return $this->request('post', '/databases', [
            'json' => array_merge($options ?? [], [
                'name' => $indexName,
                'dimension' => $dimension,
            ]),
        ]);
    }

    public function deleteIndex(
        string $indexName
    ): Response {
        return $this->request('delete', "/databases/{$indexName}");
    }

    public function listIndexes(): Response
    {
        return $this->request('get', '/databases');
    }

    public function describeIndex(
        string $indexName
    ): Response {
        return $this->request('get', "/databases/{$indexName}");
    }

    public function configureIndex(
        string $indexName,
        ?array $options = [],
    ): Response {
        return $this->request('patch', "/databases/{$indexName}", [
            'json' => $options,
        ]);
    }

    public function createCollection(
        string $collectionName,
        string $sourceIndex
    ): Response {
        return $this->request('post', '/collections', [
            'json' => [
                'name' => $collectionName,
                'source_index' => $sourceIndex,
            ],
        ]);
    }

    public function deleteCollection(
        string $collectionName
    ): Response {
        return $this->request('delete', "/collections/{$collectionName}");
    }

    public function describeCollection(
        string $collectionName
    ): Response {
        return $this->request('get', "/collections/{$collectionName}");
    }

    public function listCollections(): Response
    {
        return $this->request('get', '/collections');
    }

    public function describeIndexStats(
        ?array $filter = []
    ): Response {
        return $this->request('post', '/describe_index_stats', [
            'json' => [
                'filter' => $filter,
            ],
        ]);
    }

    public function query(
        int $topK,
        ?array $options = []
    ): Response {
        return $this->request('post', '/query', [
            'json' => array_merge($options ?? [], [
                'topK' => $topK,
                'namespace' => $this->namespace ?: $this->namespace,
            ]),
        ]);
    }

    public function delete(
        ?array $ids = [],
        ?array $filters = []
    ): Response {
        return $this->request('delete', '/vectors/delete', [
            'json' => [
                'ids' => $ids ?: [],
                'namespace' => $this->namespace ?: $this->namespace,
                'deleteAll' => false,
                'filters' => $filters,
            ],
        ]);
    }

    public function deleteAll(
        ?array $ids = [],
        ?array $filters = []
    ): Response {
        return $this->request('delete', '/vectors/delete', [
            'json' => [
                'ids' => $ids ?: [],
                'namespace' => $this->namespace ?: $this->namespace,
                'deleteAll' => true,
                'filters' => $filters,
            ],
        ]);
    }

    public function fetch(
        array $ids
    ): Response {
        return $this->request('get', '/vectors/fetch', [
            'json' => [
                'ids' => $ids ?: [],
                'namespace' => $this->namespace ?: $this->namespace,
            ],
        ]);
    }

    public function update(
        string $id,
        ?array $options = []
    ): Response {
        return $this->request('post', '/vectors/update', [
            'json' => array_merge($options ?? [], [
                'id' => $id,
                'namespace' => $this->namespace ?: $this->namespace,
            ]),
        ]);
    }

    public function upsert(
        array $vectors
    ): Response {
        return $this->request('post', '/vectors/upsert', [
            'json' => [
                'vectors' => $vectors,
                'namespace' => $this->namespace ?: $this->namespace,
            ],
        ]);
    }
}
