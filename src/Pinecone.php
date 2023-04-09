<?php

namespace AdrianMejias\Pinecone;

use Illuminate\Support\Facades\Http;
use Illuminate\Config\Repository as Config;
use AdrianMejias\Pinecone\Contracts\PineconeContract;
use AdrianMejias\Pinecone\Exceptions\PineconeException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Str;
use Exception;

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

        if (empty($this->getApiKey())) {
            throw new PineconeException('Api key is required');
        }

        if (empty($this->getEnvironment())) {
            throw new PineconeException('Environment is required');
        }

        if (empty($this->getProjectId())) {
            throw new PineconeException('Project id is required');
        }
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
        if (!in_array($method, ['get', 'post', 'put', 'delete', 'patch'])) {
            throw new PineconeException('Invalid method');
        }

        $host = $this->config->get('pinecone.controller_host');

        if ($this->indexName) {
            $host = Str::replace(
                'index_name',
                $this->indexName,
                $this->config->get('pinecone.index_host')
            );
        }

        $uri = $host . '/' . ltrim($uri, '/');
        $ignoreForExists = $options['ignore_for_exists'] ?? false;

        try {
            return Http::withHeaders(
                array_merge($options['headers'] ?? [], [
                    'Api-Key' => $this->config->get('pinecone.api_key'),
                ])
            )
                ->asJson()
                ->$method(
                    $uri,
                    $options['json'] ?? []
                )
                ->throwIf($ignoreForExists === false);
        } catch (Exception $e) {
            throw new PineconeException($e->getMessage(), $e->getCode(), $e);
        }
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
