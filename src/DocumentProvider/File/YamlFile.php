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
 * Basic yaml file on disk or network.
 */
class YamlFile extends AbstractFileLoader
{
    public const TYPE = 'yaml';

    /** Root path. */
    private string $root;

    /** Relative file name. */
    private string $name;

    /**
     * Constructor.
     *
     * @param string $root
     * @param string $name
     */
    public function __construct(string $root, string $name)
    {
        $this->root = $root;
        $this->name = $name;
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
    public function getType(): string
    {
        return self::TYPE;
    }

    public function getContent(): string
    {
        return $this->loadFile($this->root . $this->name);
    }
}
