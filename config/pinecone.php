<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pinecone API Key
    |--------------------------------------------------------------------------
    |
    | This is the API key for accessing the Pinecone API. You can obtain an
    | API key from the Pinecone console at https://pinecone.io.
    |
    */

    'api_key' => env('PINECONE_API_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Pinecone Environment
    |--------------------------------------------------------------------------
    |
    | This is the Pinecone environment to use. You can optain an environment
    | from the Pinecone console at https://pinecone.io.
    |
    */

    'environment' => env('PINECONE_ENVIRONMENT', ''),

    /*
    |--------------------------------------------------------------------------
    | Pinecone Project ID
    |--------------------------------------------------------------------------
    |
    | This is the Pinecone project ID to use. You can optain a project ID
    | from the Pinecone console at https://pinecone.io.
    |
    */

    'project_id' => env('PINECONE_PROJECT_ID', ''),

    /*
    |--------------------------------------------------------------------------
    | Pinecone Controller Host
    |--------------------------------------------------------------------------
    |
    | This is the Pinecone controller host to use. You can set this to
    | "https://controller.<environment>.pinecone.io" for your live
    | Pinecone environment.
    |
    */

    'controller_host' => env(
        'PINECONE_CONTROLLER_HOST',
        'https://controller.' . env('PINECONE_ENVIRONMENT', '') . '.pinecone.io'
    ),

    /*
    |--------------------------------------------------------------------------
    | Pinecone Index Host
    |--------------------------------------------------------------------------
    |
    | This is the Pinecone index host to use. You can set this to
    | "https://index_name-project_id.svc.environment.pinecone.io" for your live
    | Pinecone environment.
    |
    | Note: The index name is the name of the index you are using and will be
    | dynamicaly set when you set the index name in the Pinecone function arguments.
    |
    */

    'index_host' => env(
        'PINECONE_CONTROLLER_HOST',
        'https://index_name-' . env('PINECONE_PROJECT_ID', '') . '.svc.environment.pinecone.io'
    ),

];
