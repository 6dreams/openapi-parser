<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\Tests\Utils;

use PHPUnit\Framework\TestCase;
use SixDreams\OpenApi\Utils\NameUtils;

/**
 * Tests for {@see NameUtils}.
 */
class NameUtilsTest extends TestCase
{
    /**
     * Tests for {@see NameUtils::getExtension()}.
     *
     * @dataProvider getExtensionProvider().
     *
     * @param string $excepted
     * @param string $name
     */
    public function testGetExtension(string $excepted, string $name): void
    {
        self::assertEquals($excepted, NameUtils::getExtension($name));
    }

    /**
     * Test for {@see NameUtils::getPath()}.
     *
     * @dataProvider getPathProvider().
     *
     * @param string $excepted
     * @param string $name
     */
    public function testGetPath(string $excepted, string $name): void
    {
        self::assertEquals($excepted, NameUtils::getPath($name));
    }

    /**
     * Test for {@see NameUtils::getName()}.
     *
     * @dataProvider getNameProvider().
     *
     * @param string $excepted
     * @param string $name
     */
    public function testGetName(string $excepted, string $name): void
    {
        self::assertEquals($excepted, NameUtils::getName($name));
    }

    /**
     * Data provider for {@see testGetExtension()}.
     *
     * @return string[][]
     */
    public function getExtensionProvider(): array
    {
        return [
            ['json', 'file.json'],
            ['cpp', 'path/to/file.cpp'],
            ['', 'file/name'],
            ['', 'filename'],
            ['', '/some/shit.dir/file']
        ];
    }

    /**
     * Data provider for {@see testGetPath()}.
     *
     * @return string[][]
     */
    public function getPathProvider(): array
    {
        return [
            ['path', 'path'],
            ['/a/b/', '/a/b/'],
            ['a/', 'a/b']
        ];
    }

    /**
     * Data provider for {@see testGetName()}.
     *
     * @return string[][]
     */
    public function getNameProvider(): array
    {
        return [
            ['file.json', 'http://site.com/file.json'],
            ['file.yml', '/home/user/file.yml'],
            ['file', 'file']
        ];
    }
}
