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
use SixDreams\OpenApi\DocumentProvider\File\YamlFile;
use SixDreams\OpenApi\Utils\NameUtils;

/**
 * Factory for documents looking like yaml file.
 */
class YamlDocumentFileFactory implements DocumentFileFactoryInterface
{
    private const SUPPORTED = ['yaml' => true, 'yml' => true];

    /**
     * @inheritdoc
     */
    public function create(string $root, string $name): ?DocumentFileInterface
    {
        if (!(self::SUPPORTED[NameUtils::getExtension($name)] ?? false)) {
            return null;
        }

        return new YamlFile($root, $name);
    }
}
