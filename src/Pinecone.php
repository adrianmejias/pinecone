<?php

namespace AdrianMejias\Pinecone;

use Illuminate\Support\Facades\Http;
use Illuminate\Config\Repository as Config;
use AdrianMejias\Pinecone\Contracts\PineconeContract;
use AdrianMejias\Pinecone\Exceptions\PineconeException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Str;

class Pinecone implements PineconeContract
{
    /**
     * @var \Illuminate\Config\Repository
     */
    private $config;

    /**
     * @var string
     */
    private $indexName;

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

    public function setProjectId(
        string $projectId
    ): Pinecone {
        $this->config->set('pinecone.project_id', $projectId);

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

    public function getProjectId(): ?string
    {
        return $this->config->get('pinecone.project_id');
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
        $host = $this->config->get('pinecone.controller_host');

        if ($this->indexName) {
            $host = Str::replace(
                'index_name',
                $this->indexName,
                $this->config->get('pinecone.index_host')
            );
        }

        return Http::withHeaders(
            array_merge($options['headers'] ?? [], [
                'Api-Key' => $this->config->get('pinecone.api_key'),
            ])
        )
            ->asJson()
            ->$method(
                $host . '/' . ltrim($uri, '/'),
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

    public function vector(
        string $indexName
    ): PineconeVector {
        $this->indexName = $indexName;

        return new PineconeVector($this);
    }

    public function index(
        ?string $indexName = null
    ): PineconeIndex {
        return new PineconeIndex($this, $indexName);
    }

    public function collection(
        ?string $collectionName = null
    ): PineconeCollection {
        return new PineconeCollection($this, $collectionName);
    }
}
