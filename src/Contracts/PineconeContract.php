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
     * @param array<string, mixed> $options
     * @return \Illuminate\Http\Client\Response
     */
    public function request(
        string $method,
        string $uri = '',
        array $options = []
    ): Response;

    /**
     * @param string $indexName
     * @param array<string, mixed> $schema
     * @return \Illuminate\Http\Client\Response
     */
    public function createIndex(
        string $indexName,
        array $schema
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
    public function getIndex(
        string $indexName
    ): Response;

    /**
     * @param string $indexName
     * @param array<string, mixed> $query
     * @param array<string, mixed> $options
     * @return \Illuminate\Http\Client\Response
     */
    public function query(
        string $indexName,
        array $query,
        array $options = []
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
     * @param string $indexName
     * @param array<string, mixed> $vectors
     * @param string|null $namespace
     * @return \Illuminate\Http\Client\Response
     */
    public function upsert(
        string $indexName,
        array $vectors,
        string $namespace = null
    ): Response;

    /**
     * @param string $indexName
     * @param array<string, mixed> $vector
     * @param array<string, mixed> $options
     * @param string|null $namespace
     * @return \Illuminate\Http\Client\Response
     */
    public function queryVector(
        string $indexName,
        array $vector,
        array $options = [],
        string $namespace = null
    ): Response;

    /**
     * @param string $indexName
     * @param string $vectorId
     * @param array<string, mixed> $values
     * @param array<string, mixed> $metadata
     * @param array<string, mixed> $options
     * @param string|null $namespace
     * @return \Illuminate\Http\Client\Response
     */
    public function update(
        string $indexName,
        string $vectorId,
        array $values,
        array $metadata = [],
        array $options = [],
        string $namespace = null
    ): Response;

    /**
     * @param string $indexName
     * @param array<string, mixed> $ids
     * @param array<string, mixed> $options
     * @param string|null $namespace
     * @return \Illuminate\Http\Client\Response
     */
    public function fetch(
        string $indexName,
        array $ids,
        array $options = [],
        string $namespace = null
    ): Response;

    /**
     * @param string $indexName
     * @param array<string, mixed> $ids
     * @param array<string, mixed> $options
     * @param string|null $namespace
     * @return \Illuminate\Http\Client\Response
     */
    public function delete(
        string $indexName,
        array $ids,
        array $options = [],
        string $namespace = null
    ): Response;

    /**
     * @param string $indexName
     * @param array<string, mixed> $options
     * @param string|null $namespace
     * @return \Illuminate\Http\Client\Response
     */
    public function deleteAll(
        string $indexName,
        array $options = [],
        string $namespace = null
    ): Response;
}
