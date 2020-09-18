<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\DocumentProvider\Factory;

use SixDreams\OpenApi\DocumentProvider\DocumentFileFactoryInterface;
use SixDreams\OpenApi\DocumentProvider\DocumentFileInterface;
use SixDreams\OpenApi\DocumentProvider\File\JsonFile;
use SixDreams\OpenApi\Utils\NameUtils;

/**
 * Factory helping create {@see JsonFile} from it's path.
 */
class JsonDocumentFileFactory implements DocumentFileFactoryInterface
{
    /**
     * @inheritdoc
     */
    public function create(string $root, string $name): ?DocumentFileInterface
    {
        if (JsonFile::TYPE !== NameUtils::getExtension($name)) {
            return null;
        }

        return new JsonFile($root, $name);
    }
}