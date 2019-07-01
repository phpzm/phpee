<?php

namespace Php;

/**
 * Class Base64
 *
 * @method static string encode(mixed $value, int $options = 0, int $depth = 512)
 * @method static mixed decode(string $json, bool $assoc = false, int $depth = 512, int $options = 0)
 */
abstract class JSON extends Proxy
{
    /**
     * @var array
     */
    protected static $map = [
        'encode' => [
            'name' => 'json_encode',
        ],
        'decode' => [
            'name' => 'json_decode',
        ],
    ];
}
