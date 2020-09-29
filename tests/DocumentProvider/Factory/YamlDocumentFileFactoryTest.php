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
use SixDreams\OpenApi\DocumentProvider\Factory\YamlDocumentFileFactory;
use SixDreams\OpenApi\DocumentProvider\File\YamlFile;

/**
 * Test for {@see YamlDocumentFileFactory}.
 */
class YamlDocumentFileFactoryTest extends TestCase
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
        self::assertEquals($excepted, (new YamlDocumentFileFactory())->create(...$args));
    }

    /**
     * Data provider for {@see testCreate()}.
     *
     * @return array[]
     */
    public function createProvider(): array
    {
        return [
            [new YamlFile('', 'file.yaml'), '', 'file.yaml'],
            [new YamlFile('a/b/c', 'file.yaml'), 'a/b/c', 'file.yaml'],
            [new YamlFile('http://host/a/b/c', 'file.yml'), 'http://host/a/b/c', 'file.yml'],
            [null, '', 'file.xml'],
            [null, '', 'file.json']
        ];
    }
}
