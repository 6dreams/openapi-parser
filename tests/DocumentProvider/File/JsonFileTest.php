<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\Tests\DocumentProvider\File;

use PHPUnit\Framework\TestCase;
use SixDreams\OpenApi\DocumentProvider\DocumentFileInterface;
use SixDreams\OpenApi\DocumentProvider\File\JsonFile;

/**
 * Tests {@see JsonFile}.
 */
class JsonFileTest extends TestCase
{
    /**
     * Test for {@see DocumentFileInterface::getName()}.
     */
    public function testGetType(): void
    {
        self::assertEquals(JsonFile::TYPE, (new JsonFile('', ''))->getType());
    }

    /**
     * Test for {@see JsonFile::getName()}.
     *
     * @dataProvider getNameProvider().
     *
     * @param string $excepted
     * @param string $name
     */
    public function testGetName(string $excepted, string $name): void
    {
        self::assertEquals($excepted, (new JsonFile('', $name))->getName());
    }

    /**
     * Data provider for {@see testGetName()}.
     *
     * @return string[][]
     */
    public function getNameProvider(): array
    {
        return [
            ['file.json', 'file.json'],
            ['.json', '.json'],
            ['', '']
        ];
    }
}