<?php

namespace AdrianMejias\Pinecone\Contracts;

interface PineconeContract
{
    public function setApiKey(string $apiKey);

    public function setEnvironment(string $environment);

    public function setEndpoint(string $endpoint);

    public function getApiKey();

    public function getEnvironment();

    public function getEndpoint();

    public function createIndex(string $indexName, array $schema);

    public function deleteIndex(string $indexName);

    public function listIndexes();

    public function getIndex(string $indexName);

    public function query(string $indexName, array $query, array $options = []);

    public function createCollection(string $collectionName, string $sourceIndex);

    public function deleteCollection(string $collectionName);

    public function describeCollection(string $collectionName);

    public function listCollections();

    public function upsert(string $indexName, array $vectors, string $namespace = null);

    public function queryVector(string $indexName, array $vector, array $options = [], string $namespace = null);

    public function update(string $indexName, string $vectorId, array $values, array $metadata = [], array $options = [], string $namespace = null);

    public function fetch(string $indexName, array $ids, array $options = [], string $namespace = null);

    public function delete(string $indexName, array $ids, array $options = [], string $namespace = null);

    public function deleteAll(string $indexName, array $options = [], string $namespace = null);
}
