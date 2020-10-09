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
 * Abstract for basic nodes. Contains methods that supported by any type of node.
 */
abstract class AbstractNode implements NodeInterface
{
    /** Type of object */
    protected string $name;

    /** Document where node was created. */
    protected DocumentFileInterface $document;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function getDocument(): DocumentFileInterface
    {
        return $this->document;
    }
}