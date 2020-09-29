<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\Tests\DocumentProvider\Loader;

use SixDreams\OpenApi\DocumentProvider\DocumentFileInterface;
use SixDreams\OpenApi\DocumentProvider\Exception\DecodeDocumentException;
use SixDreams\OpenApi\DocumentProvider\File\YamlFile;
use SixDreams\OpenApi\DocumentProvider\Loader\YamlFileLoader;

/**
 * Tests for {@see YamlFileLoader}.
 */
class YamlFileLoaderTest extends AbstractFileLoaderTest
{
    /**
     * Tests {@see YamlFileLoader::load()} for successful decoding document.
     */
    public function testDecode(): void
    {
        self::assertEquals(
            ['test' => 'yes'],
            (new YamlFileLoader())
                ->load($this->createDocument("test: 'yes'"))
        );
    }

    /**
     * Tests {@see YamlFileLoader::load()} while loading invalid yaml document.
     */
    public function testInvalid(): void
    {
        $this->expectException(DecodeDocumentException::class);

        self::assertEquals(
            ['test' => 'yes'],
            (new YamlFileLoader())
                ->load($this->createDocument(': "', 'err.yml'))
        );
    }


    /**
     * Tests {@see YamlFileLoader::supports()}.
     *
     * @dataProvider supportProvider().
     *
     * @param bool   $excepted
     * @param string $format
     */
    public function testSupport(bool $excepted, string $format): void
    {
        /** @var DocumentFileInterface $document */
        ($document = $this->getMockBuilder(DocumentFileInterface::class)->getMock())
            ->expects(self::once())
            ->method('getType')
            ->willReturn($format);

        self::assertEquals($excepted, (new YamlFileLoader())->supports($document));
    }

    /**
     * Data provider for {@see testSupport()}.
     *
     * @return bool[][]|string[][]
     */
    public function supportProvider(): array
    {
        return [
            [true, YamlFile::TYPE],
            [false, 'jija'],
            [false, '']
        ];
    }
}
