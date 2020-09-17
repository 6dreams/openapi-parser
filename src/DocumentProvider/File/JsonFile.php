<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\DocumentProvider\File;

/**
 * Base JSON file on disk.
 */
class JsonFile extends AbstractFileLoader
{
    public const TYPE = 'json';

    /** File name. */
    private string $name;

    /** Project root path. */
    private string $root;

    /**
     * Constructor.
     *
     * @param string $root
     * @param string $name
     */
    public function __construct(string $root, string $name)
    {
        $this->name = $name;
        $this->root = $root;
    }

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return self::TYPE;
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function getContent(): string
    {
        return $this->loadFile($this->root . $this->name);
    }
}