<?php

namespace AdrianMejias\Pinecone\Contracts;

use AdrianMejias\Pinecone\Pinecone;
use Illuminate\Http\Client\Response;
use AdrianMejias\Pinecone\PineconeVector;
use AdrianMejias\Pinecone\PineconeIndex;
use AdrianMejias\Pinecone\PineconeCollection;

interface PineconeContract
{
    /**
     * @param string $apiKey
     * @return \AdrianMejias\Pinecone\Pinecone
     */
    public function setApiKey(
        string $apiKey
    ): Pinecone;

    /**
     * @param string $environment
     * @return \AdrianMejias\Pinecone\Pinecone
     */
    public function setEnvironment(
        string $environment
    ): Pinecone;

    /**
     * @param string $projectId
     * @return \AdrianMejias\Pinecone\Pinecone
     */
    public function setProjectId(
        string $projectId
    ): Pinecone;

    /**
     * @param string $endpoint
     * @return \AdrianMejias\Pinecone\Pinecone
     */
    public function setEndpoint(
        string $endpoint
    ): Pinecone;

    /**
     * @return string|null
     */
    public function getApiKey(): ?string;

    /**
     * @return string|null
     */
    public function getEnvironment(): ?string;

    /**
     * @return string|null
     */
    public function getProjectId(): ?string;

    /**
     * @return string|null
     */
    public function getEndpoint(): ?string;

    /**
     * @param string $method
     * @param string $uri
     * @param array<string, mixed>|null $options
     * @return \Illuminate\Http\Client\Response
     */
    public function request(
        string $method,
        string $uri = '',
        ?array $options = []
    ): Response;

    /**
     * @param string $indexName
     * @return \AdrianMejias\Pinecone\PineconeVector
     */
    public function vector(string $indexName): PineconeVector;

    /**
     * @param string|null $indexName
     * @return \AdrianMejias\Pinecone\PineconeIndex
     */
    public function index(?string $indexName = null): PineconeIndex;

    /**
     * @param string $collectionName
     * @return \AdrianMejias\Pinecone\PineconeCollection
     */
    public function collection(?string $collectionName = null): PineconeCollection;
}
