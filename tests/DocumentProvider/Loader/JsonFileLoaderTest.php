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

use PHPUnit\Framework\TestCase;
use SixDreams\OpenApi\DocumentProvider\DocumentFileInterface;
use SixDreams\OpenApi\DocumentProvider\Exception\DecodeDocumentException;
use SixDreams\OpenApi\DocumentProvider\File\JsonFile;
use SixDreams\OpenApi\DocumentProvider\Loader\JsonFileLoader;

/**
 * Tests {@see JsonFileLoader}.
 */
class JsonFileLoaderTest extends TestCase
{
    /**
     * Tests {@see JsonFileLoader::load()} for successful decoding document.
     */
    public function testDecode(): void
    {
        self::assertEquals(
            ['test' => 'yes'],
            (new JsonFileLoader())
                ->load($this->createDocument('{"test":"yes"}'))
        );
    }

    /**
     * Tests {@see JsonFileLoader::load()} while loading invalid json file.
     */
    public function testInvalid(): void
    {
        $this->expectException(DecodeDocumentException::class);

        self::assertEquals(
            ['test' => 'yes'],
            (new JsonFileLoader())
                ->load($this->createDocument('', 'err.json'))
        );
    }

    /**
     * Tests {@see JsonFileLoader::supports()}.
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

        self::assertEquals($excepted, (new JsonFileLoader())->supports($document));
    }

    /**
     * Data provider for {@see testSupport()}.
     *
     * @return bool[][]|string[][]
     */
    public function supportProvider(): array
    {
        return [
            [true, JsonFile::TYPE],
            [false, 'jija'],
            [false, ''],
        ];
    }

    /**
     * Creates document.
     *
     * @param string      $content
     * @param string|null $name
     *
     * @return object|DocumentFileInterface
     */
    protected function createDocument(string $content, ?string $name = null): DocumentFileInterface
    {
        $mock = $this->getMockBuilder(DocumentFileInterface::class)
            ->getMock();

        $mock
            ->expects(self::once())
            ->method('getContent')
            ->willReturn($content);

        if ($name) {
            $mock
                ->expects(self::once())
                ->method('getName')
                ->willReturn($name);
        }

        return $mock;
    }
}