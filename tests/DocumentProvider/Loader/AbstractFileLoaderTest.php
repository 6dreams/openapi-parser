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
use SixDreams\OpenApi\DocumentProvider\DocumentFileLoaderInterface;

/**
 * Generic methods for testing {@see DocumentFileLoaderInterface}.
 */
abstract class AbstractFileLoaderTest extends TestCase
{
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