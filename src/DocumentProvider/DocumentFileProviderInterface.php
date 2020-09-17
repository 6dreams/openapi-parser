<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\DocumentProvider;

use SixDreams\OpenApi\Parser;

/**
 * Provider for accessing files (with OpenAPI documents).
 */
interface DocumentFileProviderInterface
{
    /**
     * Load file content.
     *
     * @param string $name
     *
     * @return array|null
     */
    public function load(string $name): ?array;

    /**
     * Sets root path. Usially it's {@see Parser} job to set path before.
     *
     * @param string $root
     *
     * @return DocumentFileProviderInterface
     */
    public function setRoot(string $root): DocumentFileProviderInterface;
}
