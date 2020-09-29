<?php
declare(strict_types = 1);

/*
 * This file is part of the OpenAPI Parser.
 * (c) 6dreams Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SixDreams\OpenApi\Utils;

/**
 * Utility functions used to operate with file names.
 */
final class NameUtils
{
    /**
     * Get extension from file name.
     *
     * @param string $name
     *
     * @return string
     */
    public static function getExtension(string $name): string
    {
        $position = \mb_strrpos($name, '.');
        if ($position === false) {
            return '';
        }

        $ext = \mb_substr($name, $position + 1);
        if (\mb_strpos($ext, \DIRECTORY_SEPARATOR) !== false) {
            return '';
        }

        return $ext;
    }
}
