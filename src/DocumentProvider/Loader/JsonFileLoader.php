<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\DocumentProvider\Loader;

use SixDreams\OpenApi\DocumentProvider\DocumentFileInterface;
use SixDreams\OpenApi\DocumentProvider\DocumentFileLoaderInterface;
use SixDreams\OpenApi\DocumentProvider\Exception\DecodeDocumentException;
use SixDreams\OpenApi\DocumentProvider\File\JsonFile;

/**
 * Loads content of {@see JsonFile} or it's equivalent to array.
 */
class JsonFileLoader implements DocumentFileLoaderInterface
{
    /**
     * @inheritdoc
     */
    public function supports(DocumentFileInterface $document): bool
    {
        return $document->getType() === JsonFile::TYPE;
    }

    /**
     * @inheritdoc
     */
    public function load(DocumentFileInterface $document): ?array
    {
        try {
            return \json_decode($document->getContent(), true, 512, \JSON_THROW_ON_ERROR) ?: null;
        } catch (\Throwable $e) {
            throw new DecodeDocumentException($document->getName(), $e->getMessage());
        }
    }
}
