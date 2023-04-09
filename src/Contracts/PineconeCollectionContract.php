<?php

namespace AdrianMejias\Pinecone\Contracts;

use Illuminate\Http\Client\Response;

interface PineconeCollectionContract
{
    /**
     * @return bool
     */
    public function exists(): bool;

    /**
     * @param string $sourceIndex
     * @return \Illuminate\Http\Client\Response
     */
    public function create(
        string $sourceIndex
    ): Response;

    /**
     * @return \Illuminate\Http\Client\Response
     */
    public function delete(): Response;

    /**
     * @return \Illuminate\Http\Client\Response
     */
    public function describe(): Response;

    /**
     * @return \Illuminate\Http\Client\Response
     */
    public function list(): Response;
}
