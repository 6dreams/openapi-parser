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
 * Implementation of simple node that holds value.
 */
class Node extends AbstractNode
{
    /** @var array|string|int|float Value. */
    protected $value;

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return 'node';
    }
}