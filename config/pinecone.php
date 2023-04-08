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
    | Pinecone Controller Host
    |--------------------------------------------------------------------------
    |
    | This is the Pinecone controller host to use. You can set this to
    | "https://controller.<environment>.pinecone.io" for your live Pinecone environment.
    |
    */

    'controller_host' => env(
        'PINECONE_CONTROLLER_HOST',
        'https://controller.' . env('PINECONE_ENVIRONMENT', '') . '.pinecone.io'
    ),

];
