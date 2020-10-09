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

/**
 * One of node types. Used in nodes that have child nodes.
 */
abstract class NodeContainer extends AbstractNode
{
    /** @var NodeInterface[] List of nodes inlined to current node. */
    protected array $nodes;

    /** todo: use? x-something-keys */
    protected array $attributes = [];

    /**
     * Returns list of nodes attached to current node. Key is name.
     *
     * @return NodeInterface[]
     */
    public function getNodes(): array
    {
        return $this->nodes;
    }

    /**
     * Adds new child node with selected name.
     *
     * @param string        $name
     * @param NodeInterface $node
     *
     * @return NodeInterface|static
     */
    public function addNode(string $name, NodeInterface $node): NodeInterface
    {
        $this->nodes[$name] = $node;

        return $this;
    }
}