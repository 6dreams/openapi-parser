<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\Tests\DocumentProvider;

use PHPUnit\Framework\TestCase;
use SixDreams\OpenApi\DocumentProvider\DocumentFileFactoryInterface;
use SixDreams\OpenApi\DocumentProvider\DocumentFileLoaderInterface;
use SixDreams\OpenApi\DocumentProvider\DocumentProvider;
use SixDreams\OpenApi\DocumentProvider\Exception\ReadFileException;
use SixDreams\OpenApi\DocumentProvider\File\JsonFile;

/**
 * Tests {@see DocumentProvider}.
 */
class DocumentProviderTest extends TestCase
{
    private const ROOT = '/root/';
    private const NAME = 'file.json';

    /**
     * Tests error cases of {@see DocumentProvider::load()}.
     *
     * @dataProvider errorsProvider().
     *
     * @param array $factories
     * @param array $loaders
     */
    public function testErrors(array $factories, array $loaders)
    {
        $this->expectException(ReadFileException::class);

        (new DocumentProvider($loaders, $factories))
            ->setRoot('')
            ->load('');
    }

    /**
     * Test for {@see DocumentProvider::load()} successfuly loads document content to array.
     */
    public function testLoad(): void
    {
        ($factory = $this->createMock(DocumentFileFactoryInterface::class))
            ->method('create')
            ->with(self::ROOT, self::NAME)
            ->willReturn($file = new JsonFile(self::ROOT, self::NAME));

        ($loader = $this->createMock(DocumentFileLoaderInterface::class))
            ->method('supports')
            ->with($file)
            ->willReturn(true);
        $loader
            ->method('load')
            ->with($file)
            ->willReturn($excepted = ['a' => true]);

        $actual = (new DocumentProvider([$loader], [$factory]))
            ->setRoot(self::ROOT)
            ->load(self::NAME);

        self::assertEquals($excepted, $actual);
    }

    /**
     * Data provider for {@see testErrors()}.
     *
     * @return array[][]
     */
    public function errorsProvider(): array
    {
        ($factory = $this->createMock(DocumentFileFactoryInterface::class))
            ->method('create')
            ->willReturn((new JsonFile('a', 'b')));

        ($nullFactory = $this->createMock(DocumentFileFactoryInterface::class))
            ->method('create')
            ->willReturn(null);

        ($loader = $this->createMock(DocumentFileLoaderInterface::class))
            ->method('supports')
            ->willReturn(false);

        return [
            'no factories, no loaders' => [[], []],
            'null factory, no loaders' => [[$nullFactory], []],
            'factory, no loaders'      => [[$factory], []],
            'factory, false loaders'   => [[$factory], [$loader]]
        ];
    }
}