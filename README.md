# Pinecone PHP Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/adrianmejias/pinecone.svg?style=flat-square)](https://packagist.org/packages/adrianmejias/pinecone)
[![tests](https://github.com/adrianmejias/pinecone/actions/workflows/tests.yml/badge.svg)](https://github.com/adrianmejias/pinecone/actions/workflows/tests.yml)
[![static analysis](https://github.com/adrianmejias/pinecone/actions/workflows/static-analysis.yml/badge.svg)](https://github.com/adrianmejias/pinecone/actions/workflows/static-analysis.yml)
[![License](https://img.shields.io/packagist/l/adrianmejias/pinecone.svg?style=flat-square)](https://packagist.org/packages/adrianmejias/pinecone)

This package provides a `Laravel` wrapper for the `Pinecone API`. It enables you to easily interact with the `Pinecone API` in your `Laravel` projects.

## Installation

You can install the package via composer:

```bash
composer require adrianmejias/pinecone
```
You can also optionally publish the configuration file with:

```bash
php artisan vendor:publish --provider="AdrianMejias\Pinecone\PineconeServiceProvider" --tag="config"
```

This will publish a `pinecone.php` file in your config directory, which you can customize as needed.

## Configuration

Before using the package, you will need to set your Pinecone API key and environment. You can do this by setting the `PINECONE_API_KEY`, `PINECONE_PROJECT_ID` and `PINECONE_ENVIRONMENT` environment variables, or by updating the values in your `config/pinecone.php` file.

You can also optionally set the `PINECONE_CONTROLLER_HOST`/`PINECONE_INDEX_HOST` environment variable or update the `controller_host`/`index_host` value in your `config/pinecone.php` file to specify a custom controller/index host.

## Usage

You can use the Pinecone facade to interact with the Pinecone API. Here's an example of how to create an index:

```php
use AdrianMejias\Pinecone\Facades\Pinecone;

// Create an index
$response = Pinecone::index('my-index')->create([
    'metric' => 'cosine',
    'pods' => 1,
    'replicas' => 1,
    'pod_type' => 'p1.x1',
]);

// Query with namespace
$response = Pinecone::vector('my-index')->namespace('my-namespace')->query(10);
```

This will create an index named `my-index` with two `fields`, `field1` and `field2`.

## Available Methods

The following methods are available via the Pinecone Facade:

- setApiKey(string $apiKey): Pinecone: Sets the API key to be used for Pinecone requests
- setEnvironment(string $environment): Pinecone: Sets the Pinecone environment to be used
- setProjectId(string $projectId): Pinecone: Sets the Pinecone project ID to be used
- setEndpoint(string $endpoint): Pinecone: Sets the Pinecone controller host to be used
- getApiKey(): ?string: Gets the current API key being used
- getEnvironment(): ?string: Gets the current Pinecone environment being used
- getProjectId(): ?string: Gets the current Pinecone project ID being used
- getEndpoint(): ?string: Gets the current Pinecone controller host being used
- vector(string $indexName): Pinecone: Vector Operations
- index(?string $indexName = null): Pinecone: Index Operations
- collection(?string $collectionName = null): Index Collection Operations

Please refer to the [official Pinecone API Reference](https://docs.pinecone.io/reference/describe_index_stats_post) for more information on how to use the API.

## License

The Pinecone PHP package is open-sourced software licensed under the [MIT license](LICENSE.md).
