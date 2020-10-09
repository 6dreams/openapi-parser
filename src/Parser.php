<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi;

use SixDreams\OpenApi\DocumentProvider\DocumentFileProviderInterface;
use SixDreams\OpenApi\Utils\NameUtils;

/**
 * OpenAPI parser core.
 */
class Parser
{
    /** Provider to access files. */
    private DocumentFileProviderInterface $provider;

    /**
     * Constructor.
     *
     * @param DocumentFileProviderInterface $provider
     */
    public function __construct(DocumentFileProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Parses file and it's includes into document.
     *
     * @param string $path
     *
     * @return null
     */
    public function parse(string $path)
    {
        if (!($primary = $this->provider->setRoot(NameUtils::getPath($path))->load(NameUtils::getName($path)))) {
            return null;
        }

        // todo: create parser also add to parse provider or ref to current parser.

        return null;
    }
}
