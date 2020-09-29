<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\DocumentProvider\Exception;

use SixDreams\OpenApi\DocumentProvider\DocumentFileInterface;

/**
 * Throw when {@see DocumentFileInterface} cannot provide content.
 */
class ReadFileException extends ProviderException
{
    /**
     * Constructor.
     *
     * @param string $name
     * @param string $reason
     */
    public function __construct(string $name, string $reason)
    {
        parent::__construct(\sprintf('Cannot read "%s": %s!', $name, $reason));
    }
}
