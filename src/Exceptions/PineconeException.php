<?php

namespace AdrianMejias\Pinecone\Exceptions;

use Exception;

class PineconeException extends Exception
{
    public static function invalidApiKey()
    {
        return new static('Invalid Pinecone API key.');
    }

    public static function invalidEnvironment()
    {
        return new static('Invalid Pinecone environment.');
    }

    public static function invalidIndexName()
    {
        return new static('Invalid Pinecone index name.');
    }

    public static function invalidCollectionName()
    {
        return new static('Invalid Pinecone collection name.');
    }

    public static function invalidVectorId()
    {
        return new static('Invalid Pinecone vector ID.');
    }

    public static function invalidNamespace()
    {
        return new static('Invalid Pinecone namespace.');
    }

    public static function invalidVector()
    {
        return new static('Invalid Pinecone vector.');
    }

    public static function invalidVectors()
    {
        return new static('Invalid Pinecone vectors.');
    }

    public static function invalidIds()
    {
        return new static('Invalid Pinecone IDs.');
    }

    public static function invalidQuery()
    {
        return new static('Invalid Pinecone query.');
    }

    public static function invalidOptions()
    {
        return new static('Invalid Pinecone options.');
    }

    public static function invalidSchema()
    {
        return new static('Invalid Pinecone schema.');
    }

    public static function invalidSourceIndex()
    {
        return new static('Invalid Pinecone source index.');
    }

    public static function invalidValues()
    {
        return new static('Invalid Pinecone values.');
    }

    public static function invalidMetadata()
    {
        return new static('Invalid Pinecone metadata.');
    }

    public static function invalidResponse()
    {
        return new static('Invalid Pinecone response.');
    }
}
