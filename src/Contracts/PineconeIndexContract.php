<?php

namespace AdrianMejias\Pinecone\Contracts;

use Illuminate\Http\Client\Response;

interface PineconeIndexContract
{
    /**
     * @return bool
     */
    public function exists(): bool;

    /**
     * @param int $dimension
     * @param array<string, mixed>|null $options
     * @return \Illuminate\Http\Client\Response
     */
    public function create(
        int $dimension,
        ?array $options = []
    ): Response;

    /**
     * @return \Illuminate\Http\Client\Response
     */
    public function delete(): Response;

    /**
     * @return \Illuminate\Http\Client\Response
     */
    public function list(): Response;

    /**
     * @return \Illuminate\Http\Client\Response
     */
    public function describe(): Response;

    /**
     * @param array<string, mixed> $options
     * @return \Illuminate\Http\Client\Response
     */
    public function configure(?array $options = []): Response;
}
