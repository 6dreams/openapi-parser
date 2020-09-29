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
 * Document. Please note that document can be swagger 2.0 or openapi 3.0.
 */
class DocumentNode extends NodeContainer
{
    /** @var string|null Extracted version from root element. */
    protected ?string $version;

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return '';
    }

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return 'document';
    }
}
