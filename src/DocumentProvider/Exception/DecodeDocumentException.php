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

use SixDreams\OpenApi\DocumentProvider\DocumentFileLoaderInterface;

/**
 * Throwed when {@see DocumentFileLoaderInterface::load()} cannot transform raw file content to array.
 */
class DecodeDocumentException extends ProviderException
{
    public function __construct(string $name, string $message)
    {
        parent::__construct(\sprintf('Cannot decode document "%s": %s!', $name, $message));
    }
}