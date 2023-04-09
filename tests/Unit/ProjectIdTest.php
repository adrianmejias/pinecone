<?php

use AdrianMejias\Pinecone\Facades\Pinecone;

it('can set a project id', function () {
    Pinecone::setProjectId('test-project-id');
    $projectId = Pinecone::getPRojectId();

    expect($projectId)->toEqual('test-project-id');
});
