<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\DocumentProvider\Loader;

use SixDreams\OpenApi\DocumentProvider\DocumentFileInterface;
use SixDreams\OpenApi\DocumentProvider\DocumentFileLoaderInterface;
use SixDreams\OpenApi\DocumentProvider\Exception\DecodeDocumentException;
use SixDreams\OpenApi\DocumentProvider\File\YamlFile;
use Symfony\Component\Yaml\Yaml;

/**
 * Loads content of {@see YamlFile} or it's equivalent to array.
 */
class YamlFileLoader implements DocumentFileLoaderInterface
{
    /**
     * @inheritdoc
     */
    public function supports(DocumentFileInterface $document): bool
    {
        return $document->getType() === YamlFile::TYPE;
    }

    /**
     * @inheritdoc
     */
    public function load(DocumentFileInterface $document): ?array
    {
        if (\extension_loaded('yaml')) {
            $prev = ini_get('yaml.decode_php');
            ini_set('yaml.decode_php', '0');
            /** @noinspection PhpUsageOfSilenceOperatorInspection */
            $result = @\yaml_parse($document->getContent());
            ini_set('yaml.decode_php', $prev);

            if (false === $result) {
                throw new DecodeDocumentException($document->getName(), 'invalid document');
            }
        } else {
            try {
                $result = Yaml::parse($document->getContent(), Yaml::PARSE_EXCEPTION_ON_INVALID_TYPE);
            } catch (\Throwable $e) {
                throw new DecodeDocumentException($document->getName(), $e->getMessage());
            }
        }

        return \is_array($result) ? $result : null;
    }
}
