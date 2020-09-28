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
use SixDreams\OpenApi\DocumentProvider\Exception\ReadFileException;
use SixDreams\OpenApi\DocumentProvider\File\AbstractFileLoader;

/**
 * Tests {@see DocumentFileInterface}, contains basic tests that are same for all implementations.
 */
class AbstractFileLoaderTest extends TestCase
{
    /**
     * Test for {@see AbstractFileLoader::loadFile()} fails to open.
     *
     * @dataProvider errorsProvider().
     *
     * @param string $name
     */
    public function testErrors(string $name): void
    {
        $this->expectException(ReadFileException::class);
        $this->createFileLoader($name)->getContent();
    }

    /**
     * Tests that {@see AbstractFileLoader::loadFile()} can read file correctly.
     */
    public function testRead(): void
    {
        $file = \fopen($name = \tempnam(\sys_get_temp_dir(), 'aflt'), 'rw+');
        \fwrite($file, $excepted = \str_repeat('abc', 36));

        self::assertEquals($excepted, $this->createFileLoader($name)->getContent());

        \fclose($file);
        \unlink($name);
    }

    /**
     * Data provider for {@see testErrors()}.
     *
     * @return string[][]
     */
    public function errorsProvider(): array
    {
        return [
            ['/root'],
            ['/not-exists-file.']
        ];
    }

    /**
     * Create object that implements {@see DocumentFileInterface} and provides fast call
     *  {@see AbstractFileLoader::loadFile()} via {@see DocumentFileInterface::getContent()}.
     *
     * @param string $file
     *
     * @return AbstractFileLoader
     */
    protected function createFileLoader(string $file): AbstractFileLoader
    {
        return new class($file) extends AbstractFileLoader{
            /** @var string */
            protected string $name;

            /**
             * Constructor.
             *
             * @param string $name
             */
            public function __construct(string $name)
            {
                $this->name = $name;
            }

            /**
             * @inheritdoc
             */
            public function getType(): string
            {
                return '';
            }

            /**
             * @inheritdoc
             */
            public function getName(): string
            {
                return '';
            }

            /**
             * @inheritdoc
             */
            public function getContent(): string
            {
                return $this->loadFile($this->name);
            }
        };
    }
}