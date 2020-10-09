<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\Parser;

/**
 * Parses single element of document into DTO.
 */
interface NodeParserInterface
{
    /**
     * TODO: temporary method, thinks about it.
     *
     * @param array $node
     *
     * @return mixed
     */
    public function parse(array $node);
}
