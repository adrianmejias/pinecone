<?php

namespace AdrianMejias\Pinecone\Contracts;

use AdrianMejias\Pinecone\Pinecone;
use Illuminate\Http\Client\Response;

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
     * @param string $namespace
     * @return \AdrianMejias\Pinecone\Pinecone
     */
    public function namespace(string $namespace): Pinecone;

    /**
     * @param string $indexName
     * @param int $dimension
     * @param array<string, mixed>|null $options
     * @return \Illuminate\Http\Client\Response
     */
    public function createIndex(
        string $indexName,
        int $dimension,
        ?array $options = []
    ): Response;

    /**
     * @param string $indexName
     * @return \Illuminate\Http\Client\Response
     */
    public function deleteIndex(
        string $indexName
    ): Response;

    /**
     * @return \Illuminate\Http\Client\Response
     */
    public function listIndexes(): Response;

    /**
     * @param string $indexName
     * @return \Illuminate\Http\Client\Response
     */
    public function describeIndex(
        string $indexName
    ): Response;

    /**
     * @param string $indexName
     * @param array<string, mixed> $options
     * @return \Illuminate\Http\Client\Response
     */
    public function configureIndex(
        string $indexName,
        ?array $options = []
    ): Response;

    /**
     * @param string $collectionName
     * @param string $sourceIndex
     * @return \Illuminate\Http\Client\Response
     */
    public function createCollection(
        string $collectionName,
        string $sourceIndex
    ): Response;

    /**
     * @param string $collectionName
     * @return \Illuminate\Http\Client\Response
     */
    public function deleteCollection(
        string $collectionName
    ): Response;

    /**
     * @param string $collectionName
     * @return \Illuminate\Http\Client\Response
     */
    public function describeCollection(
        string $collectionName
    ): Response;

    /**
     * @return \Illuminate\Http\Client\Response
     */
    public function listCollections(): Response;

    /**
     * @param array<string, mixed> $filter
     * @return \Illuminate\Http\Client\Response
     */
    public function describeIndexStats(
        ?array $filter = []
    ): Response;

    /**
     * @param int $topK
     * @param array<string, mixed>|null $options
     * @return \Illuminate\Http\Client\Response
     */
    public function query(
        int $topK,
        ?array $options = []
    ): Response;

    /**
     * @param array<string>|null $ids
     * @param array<string, mixed>|null $filters
     * @return \Illuminate\Http\Client\Response
     */
    public function delete(
        ?array $ids = [],
        ?array $filters = []
    ): Response;

    /**
     * @param array<string>|null $ids
     * @param array<string, mixed>|null $filters
     * @return \Illuminate\Http\Client\Response
     */
    public function deleteAll(
        ?array $ids = [],
        ?array $filters = []
    ): Response;

    /**
     * @param array<string> $ids
     * @return \Illuminate\Http\Client\Response
     */
    public function fetch(
        array $ids
    ): Response;

    /**
     * @param string $id
     * @param array<string, mixed>|null $options
     * @return \Illuminate\Http\Client\Response
     */
    public function update(
        string $id,
        ?array $options = []
    ): Response;

    /**
     * @param array<string, mixed> $vectors
     * @return \Illuminate\Http\Client\Response
     */
    public function upsert(
        array $vectors
    ): Response;
}
