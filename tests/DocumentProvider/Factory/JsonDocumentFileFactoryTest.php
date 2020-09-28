<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\Tests\DocumentProvider\Factory;

use PHPUnit\Framework\TestCase;
use SixDreams\OpenApi\DocumentProvider\DocumentFileInterface;
use SixDreams\OpenApi\DocumentProvider\Factory\JsonDocumentFileFactory;
use SixDreams\OpenApi\DocumentProvider\File\JsonFile;

/**
 * Tests {@see JsonDocumentFileFactory}.
 */
class JsonDocumentFileFactoryTest extends TestCase
{
    /**
     * Tests {@see JsonDocumentFileFactory::create()}.
     *
     * @dataProvider createProvider().
     *
     * @param DocumentFileInterface|null $excepted
     * @param string                     ...$args
     */
    public function testCreate(?DocumentFileInterface $excepted, string ...$args): void
    {
        self::assertEquals($excepted, (new JsonDocumentFileFactory())->create(...$args));
    }

    /**
     * Data provider for {@see testCreate()}.
     *
     * @return array[]
     */
    public function createProvider(): array
    {
        return [
            [new JsonFile('', 'file.json'), '', 'file.json'],
            [new JsonFile('a/b/c', 'file.json'), 'a/b/c', 'file.json'],
            [null, '', 'file.xml']
        ];
    }
}