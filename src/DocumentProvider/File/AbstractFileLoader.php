<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\DocumentProvider\File;

use SixDreams\OpenApi\DocumentProvider\DocumentFileInterface;
use SixDreams\OpenApi\DocumentProvider\Exception\ReadFileException;

/**
 * Generic functions for {@see DocumentFileInterface}.
 */
abstract class AbstractFileLoader implements DocumentFileInterface
{
    /**
     * Load file from any source supported by {@see file_get_contents()}.
     *
     * @param string $name
     *
     * @return string
     */
    protected function loadFile(string $name): string
    {
        try {
            /** @noinspection PhpUsageOfSilenceOperatorInspection */
            if (false === ($content = @\file_get_contents($name))) {
                throw new ReadFileException($name, (\error_get_last() ?? [])['message'] ?? 'unknown error');
            }

            return $content;
        } catch (\Throwable $e) {
            throw new ReadFileException($name, $e->getMessage());
        }
    }
}