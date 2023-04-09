<?php

namespace AdrianMejias\Pinecone;

use Illuminate\Http\Client\Response;
use AdrianMejias\Pinecone\Contracts\PineconeIndexContract;

class PineconeIndex implements PineconeIndexContract
{
    /**
     * @var \AdrianMejias\Pinecone\Pinecone
     */
    private $pinecone;

    /**
     * @var string|null
     */
    private $indexName;

    /**
     * @param \AdrianMejias\Pinecone\Pinecone $pinecone
     * @param string|null $indexName
     */
    public function __construct(
        Pinecone $pinecone,
        ?string $indexName = null
    ) {
        $this->pinecone = $pinecone;
        $this->indexName = $indexName;
    }

    public function exists(): bool
    {
        return $this->pinecone->request('get', "/databases/{$this->indexName}", [
            'ignore_for_exists' => true,
        ])->successful();
    }

    public function create(
        int $dimension,
        ?array $options = []
    ): Response {
        return $this->pinecone->request('post', '/databases', [
            'json' => array_merge($options ?? [], [
                'name' => $this->indexName,
                'dimension' => $dimension,
            ]),
        ]);
    }

    public function delete(): Response
    {
        return $this->pinecone->request('delete', "/databases/{$this->indexName}");
    }

    public function list(): Response
    {
        return $this->pinecone->request('get', '/databases');
    }

    public function describe(): Response
    {
        return $this->pinecone->request('get', "/databases/{$this->indexName}");
    }

    public function configure(?array $options = []): Response
    {
        return $this->pinecone->request('patch', "/databases/{$this->indexName}", [
            'json' => $options,
        ]);
    }
}
