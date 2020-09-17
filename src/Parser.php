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
}
