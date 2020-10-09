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

    /**
     * Return path to file in URI.
     *
     * @param string $name
     *
     * @return string
     */
    public static function getPath(string $name): string
    {
        return \mb_substr($name, 0, ($len = \mb_strrpos($name, \DIRECTORY_SEPARATOR)) ? $len + 1 : \mb_strlen($name));
    }

    /**
     * Return file name from URI.
     *
     * @param string $name
     *
     * @return string
     */
    public static function getName(string $name): string
    {
        return \mb_substr($name, ($len = \mb_strrpos($name, \DIRECTORY_SEPARATOR)) ? $len + 1 : 0);
    }
}
