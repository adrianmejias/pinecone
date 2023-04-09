<?php

namespace AdrianMejias\Pinecone\Contracts;

use AdrianMejias\Pinecone\PineconeVector;
use Illuminate\Http\Client\Response;

interface PineconeVectorContract
{
    /**
     * @param string $namespace
     * @return \AdrianMejias\Pinecone\PineconeVector
     */
    public function namespace(string $namespace): PineconeVector;

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
