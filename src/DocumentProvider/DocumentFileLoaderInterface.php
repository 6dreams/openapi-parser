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
 * Parser interface, loads raw data from file to array.
 */
interface DocumentFileLoaderInterface
{
    /**
     * Does document can be parsed with this parser.
     *
     * @param DocumentFileInterface $document
     *
     * @return bool
     */
    public function supports(DocumentFileInterface $document): bool;

    /**
     * Load file into array.
     *
     * @param DocumentFileInterface $document
     *
     * @return array|null
     */
    public function load(DocumentFileInterface $document): ?array;
}