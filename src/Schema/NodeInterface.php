<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\Schema;

use SixDreams\OpenApi\DocumentProvider\DocumentFileInterface;

/**
 * Interface for all OpenAPI objects.
 */
interface NodeInterface
{
    /**
     * Gets the type of the node.
     *
     * @return string Type of the node
     */
    public function getType(): string;

    /**
     * Returns name of node.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns document where node was defined.
     *
     * @return DocumentFileInterface
     */
    public function getDocument(): DocumentFileInterface;
}
