<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\DocumentProvider;

use SixDreams\OpenApi\DocumentProvider\Exception\ReadFileException;

/**
 * Basic document provider.
 */
class DocumentProvider implements DocumentFileProviderInterface
{
    /** @var DocumentFileLoaderInterface[] */
    protected array $loaders;

    /** @var DocumentFileFactoryInterface[] factories for files */
    protected array $factories;

    /** @var string  */
    protected string $root = '';

    /**
     * Constructor.
     *
     * @param DocumentFileLoaderInterface[]  $loaders
     * @param DocumentFileFactoryInterface[] $factories
     */
    public function __construct(array $loaders, array $factories)
    {
        $this->loaders   = $loaders;
        $this->factories = $factories;
    }

    /**
     * @inheritdoc
     */
    public function load(string $name): ?array
    {
        foreach ($this->factories as $factory) {
            if (($file = $factory->create($this->root, $name))) {
                foreach ($this->loaders as $loader) {
                    if (!$loader->supports($file)) {
                        continue;
                    }

                    return $loader->load($file);
                }

                throw new ReadFileException($name, 'loader not found');
            }
        }

        throw new ReadFileException($name, 'factory not found');
    }

    /**
     * @inheritdoc
     */
    public function setRoot(string $root): DocumentFileProviderInterface
    {
        $this->root = $root;

        return $this;
    }
}