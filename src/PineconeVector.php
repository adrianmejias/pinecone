<?php

namespace AdrianMejias\Pinecone;

use Illuminate\Http\Client\Response;
use AdrianMejias\Pinecone\Contracts\PineconeVectorContract;

class PineconeVector implements PineconeVectorContract
{
    /**
     * @var \AdrianMejias\Pinecone\Pinecone
     */
    private $pinecone;

    /**
     * @var string
     */
    private $namespace;

    /**
     * @param \AdrianMejias\Pinecone\Pinecone $pinecone
     */
    public function __construct(Pinecone $pinecone)
    {
        $this->pinecone = $pinecone;
    }

    public function namespace(
        string $namespace
    ): PineconeVector {
        $this->namespace = $namespace;

        return $this;
    }

    public function describeIndexStats(
        ?array $filter = []
    ): Response {
        return $this->pinecone->request('post', '/describe_index_stats', [
            'json' => [
                'filter' => $filter,
            ],
        ]);
    }

    public function query(
        int $topK,
        ?array $options = []
    ): Response {
        return $this->pinecone->request('post', '/query', [
            'json' => array_merge($options ?? [], [
                'topK' => $topK,
                'namespace' => $this->namespace ?: $this->namespace,
            ]),
        ]);
    }

    public function delete(
        ?array $ids = [],
        ?array $filters = []
    ): Response {
        return $this->pinecone->request('delete', '/vectors/delete', [
            'json' => [
                'ids' => $ids ?: [],
                'namespace' => $this->namespace ?: $this->namespace,
                'deleteAll' => false,
                'filters' => $filters,
            ],
        ]);
    }

    public function deleteAll(
        ?array $ids = [],
        ?array $filters = []
    ): Response {
        return $this->pinecone->request('delete', '/vectors/delete', [
            'json' => [
                'ids' => $ids ?: [],
                'namespace' => $this->namespace ?: $this->namespace,
                'deleteAll' => true,
                'filters' => $filters,
            ],
        ]);
    }

    public function fetch(
        array $ids
    ): Response {
        return $this->pinecone->request('get', '/vectors/fetch', [
            'json' => [
                'ids' => $ids ?: [],
                'namespace' => $this->namespace ?: $this->namespace,
            ],
        ]);
    }

    public function update(
        string $id,
        ?array $options = []
    ): Response {
        return $this->pinecone->request('post', '/vectors/update', [
            'json' => array_merge($options ?? [], [
                'id' => $id,
                'namespace' => $this->namespace ?: $this->namespace,
            ]),
        ]);
    }

    public function upsert(
        array $vectors
    ): Response {
        return $this->pinecone->request('post', '/vectors/upsert', [
            'json' => [
                'vectors' => $vectors,
                'namespace' => $this->namespace ?: $this->namespace,
            ],
        ]);
    }
}
