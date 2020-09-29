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
use SixDreams\OpenApi\DocumentProvider\File\YamlFile;

/**
 * Test for {@see YamlFile}.
 */
class YamlFileTest extends TestCase
{
    /**
     * Test for {@see YamlFile::getName()}.
     */
    public function testGetType(): void
    {
        self::assertEquals(YamlFile::TYPE, (new YamlFile('', ''))->getType());
    }

    /**
     * Test for {@see YamlFile::getName()}.
     *
     * @dataProvider getNameProvider().
     *
     * @param string $excepted
     * @param string $name
     */
    public function testGetName(string $excepted, string $name): void
    {
        self::assertEquals($excepted, (new YamlFile('', $name))->getName());
    }

    /**
     * Data provider for {@see testGetName()}.
     *
     * @return string[][]
     */
    public function getNameProvider(): array
    {
        return [
            ['file.yml', 'file.yml'],
            ['.yaml', '.yaml'],
            ['', '']
        ];
    }
}
