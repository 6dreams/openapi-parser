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

/**
 * Build different {@see DocumentFileInterface} depends on it's path.
 */
interface DocumentFileFactoryInterface
{
    /**
     * Create {@see DocumentFileInterface} if supported.
     *
     * @param string $root
     * @param string $name
     *
     * @return DocumentFileInterface|null
     */
    public function create(string $root, string $name): ?DocumentFileInterface;
}
