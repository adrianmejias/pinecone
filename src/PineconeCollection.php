<?php

namespace AdrianMejias\Pinecone;

use Illuminate\Http\Client\Response;
use AdrianMejias\Pinecone\Contracts\PineconeCollectionContract;

class PineconeCollection implements PineconeCollectionContract
{
    /**
     * @var \AdrianMejias\Pinecone\Pinecone
     */
    private $pinecone;

    /**
     * @var string|null
     */
    private $collectionName;

    /**
     * @param \AdrianMejias\Pinecone\Pinecone $pinecone
     * @param string|null $collectionName
     */
    public function __construct(
        Pinecone $pinecone,
        ?string $collectionName = null
    ) {
        $this->pinecone = $pinecone;
        $this->collectionName = $collectionName;
    }

    public function create(
        string $sourceIndex
    ): Response {
        return $this->pinecone->request('post', '/collections', [
            'json' => [
                'name' => $this->collectionName,
                'source_index' => $sourceIndex,
            ],
        ]);
    }

    public function delete(): Response
    {
        return $this->pinecone->request('delete', "/collections/{$this->collectionName}");
    }

    public function describe(): Response
    {
        return $this->pinecone->request('get', "/collections/{$this->collectionName}");
    }

    public function list(): Response
    {
        return $this->pinecone->request('get', '/collections');
    }
}
