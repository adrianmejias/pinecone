# Pinecone PHP Package

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
```

This will create an index named `my-index` with two `fields`, `field1` and `field2`.

## Available Methods

The following methods are available via the Pinecone Facade:

- `setApiKey`*(string $apiKey)*: PineconeContract: sets the API key to be used for Pinecone requests
- `setEnvironment`*(string $environment)*: PineconeContract: sets the Pinecone environment to be used
- `setEndpoint`*(string $endpoint)*: PineconeContract: sets the Pinecone controller host to be used
- `getApiKey`*(): ?string*: gets the current API key being used
- `getEnvironment`*(): ?string*: gets the current Pinecone environment being used
- `getEndpoint`*(): ?string*: gets the current Pinecone controller host being used
- `createIndex`*(string $indexName, array $schema): mixed*: creates an index with the given name and schema
- `deleteIndex`*(string $indexName): mixed*: deletes the index with the given name
- `listIndexes`*(): mixed*: retrieves a list of all indexes
- `getIndex`*(string $indexName): mixed*: retrieves information about the index with the given name
- `query`*(string $indexName, array $query, array $options = []): mixed*: queries the index with the given name using the specified query and options
- `createCollection`*(string $collectionName, string $sourceIndex): mixed*: creates a new collection with the specified name and source index
- `deleteCollection`*(string $collectionName): mixed*: deletes the collection with the given name
- `describeCollection`*(string $collectionName): mixed*: retrieves information about the collection with the given name
- `listCollections`*(): mixed*: retrieves a list of all collections
- `upsert`*(string $indexName, array $vectors, string $namespace = null): mixed*: adds or updates the specified vectors in the index with the given name
- `queryVector`*(string $indexName, array $vector, array $options = [], string $namespace = null): mixed*: queries the index with the given name using the specified vector and options
- `update`*(string $indexName, string $vectorId, array $values, array $metadata = [], array $options = [], string $namespace = null): mixed*: updates the vector with the specified ID in the index with the given name
- `fetch`*(string $indexName, array $ids, array $options = [], string $namespace = null): mixed*: retrieves the vectors with the specified IDs from the index with the given name
- `delete`*(string $indexName, array $ids, array $options = [], string $namespace = null): mixed*: deletes the vectors with the specified IDs from the index with the given name
- `deleteAll`*(string $indexName, array $options = [], string $namespace = null): mixed*: deletes all vectors in the index with the given name.

Please refer to the [official Pinecone API documentation](https://docs.pinecone.io/docs) for more information on how to use the API.

## License

The Pinecone PHP package is open-sourced software licensed under the [MIT license](LICENSE.md).
