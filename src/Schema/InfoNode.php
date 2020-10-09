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
 * The object provides metadata about the API.
 */
class InfoNode extends NodeContainer
{
    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return 'info_object';
    }
}
