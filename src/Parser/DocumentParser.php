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

use SixDreams\OpenApi\Schema\DocumentNode;

/**
 * Converts array into {@see DocumentNode}.
 */
class DocumentParser implements NodeParserInterface
{
    /**
     * @inheritdoc
     */
    public function parse(array $node)
    {
        $doc = new DocumentNode();

        foreach ($node as $name => $value) {
            $doc->addNode($name, $doc);
        }

        return $doc;
    }
}
