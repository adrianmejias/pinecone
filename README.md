# Pinecone PHP Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/adrianmejias/pinecone.svg?style=flat-square)](https://packagist.org/packages/adrianmejias/pinecone)
[![tests](https://github.com/adrianmejias/pinecone/actions/workflows/tests.yml/badge.svg)](https://github.com/adrianmejias/pinecone/actions/workflows/tests.yml)
[![static analysis](https://github.com/adrianmejias/pinecone/actions/workflows/static-analysis.yml/badge.svg)](https://github.com/adrianmejias/pinecone/actions/workflows/static-analysis.yml)
[![License](https://img.shields.io/packagist/l/adrianmejias/pinecone.svg?style=flat-square)](https://packagist.org/packages/adrianmejias/pinecone)

This package provides a Laravel wrapper for the Pinecone API. It enables you to easily interact with the Pinecone API in your Laravel projects.

## Installation

You can install the package via composer:

```bash
composer require adrianmejias/pinecone
```
You can also optionally publish the configuration file with:

```bash
php artisan vendor:publish --provider="AdrianMejias\Pinecone\PineconeServiceProvider" --tag="config"
```

This will publish a pinecone.php file in your config directory, which you can customize as needed.

## Configuration

Before using the package, you will need to set your Pinecone API key and environment. You can do this by setting the `PINECONE_API_KEY` and `PINECONE_ENVIRONMENT` environment variables, or by updating the values in your `config/pinecone.php` file.

You can also optionally set the `PINECONE_CONTROLLER_HOST` environment variable or update the `controller_host` value in your `config/pinecone.php` file to specify a custom controller host.

## Usage

You can use the Pinecone facade to interact with the Pinecone API. Here's an example of how to create an index:

```php
use AdrianMejias\Pinecone\Facades\Pinecone;

// Create an index
$response = Pinecone::createIndex('my-index', [
    'field_1' => 'int32',
    'field_2' => 'float32',
]);

// Query with namespace
$response = Pinecone::namespace('example-namespace')->query(10);
```

This will create an index named `my-index` with two `fields`, `field1` and `field2`.

## Available Methods

The following methods are available via the Pinecone Facade:

- setApiKey(string $apiKey): Pinecone: Sets the API key to be used for Pinecone requests
- setEnvironment(string $environment): Pinecone: Sets the Pinecone environment to be used
- setEndpoint(string $endpoint): Pinecone: Sets the Pinecone controller host to be used
- getApiKey(): ?string: Gets the current API key being used
- getEnvironment(): ?string: Gets the current Pinecone environment being used
- getEndpoint(): ?string: Gets the current Pinecone controller host being used
- namespace(string $namespace): Pinecone: Sets the namespace to be used for Pinecone requests
- createIndex(string $indexName, int $dimension, array $options = []): Response: Creates an index with the given name and dimension
- deleteIndex(string $indexName): Response: Deletes the index with the given name
- listIndexes(): Response: Retrieves a list of all indexes
- describeIndex(string $indexName): Response: Retrieves information about the index with the given name
- configureIndex(string $indexName, ?array $options = []): Response: Configures an index with the given options
- createCollection(string $collectionName, string $sourceIndex): Response: Creates a new collection with the specified name and source index
- deleteCollection(string $collectionName): Response: Deletes the collection with the given name
- describeCollection(string $collectionName): Response: Retrieves information about the collection with the given name
- listCollections(): Response: Retrieves a list of all collections
- describeIndexStats(?array $filter = []): Response: Retrieves statistics about the index with the given filter
- query(int $topK, ?array $options = []): Response: Queries the index with the given top K and options
- delete(?array $ids = [], ?array $filters = []): Response: Deletes vectors from the index with the given IDs or filters
- deleteAll(?array $ids = [], ?array $filters = []): Response: Deletes all vectors from the index with the given IDs or filters
- fetch(array $ids): Response: Retrieves vectors from the index with the given IDs
- update(string $id, ?array $options = []): Response: Updates the vector with the specified ID in the index with the given options
- upsert(array $vectors): Response: Adds or updates the specified vectors in the index

Please refer to the [official Pinecone API documentation](https://docs.pinecone.io/docs) for more information on how to use the API.

## License

The Pinecone PHP package is open-sourced software licensed under the [MIT license](LICENSE.md).
