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
 * Representing file with OpenAPI document, provided by {@see DocumentFileProviderInterface}.
 */
interface DocumentFileInterface
{
    /**
     * Returns text representaion of file type, usially it is file format. Determines what
     *  {@see DocumentFileLoaderInterface} use.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Return relative path name to file.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Load file content from it's storage.
     *
     * @return string
     */
    public function getContent(): string;
}
