<?php

namespace Php;

use ErrorException;

if (!function_exists('filter')) {
    /**
     * @param int $source
     * @param string $index
     * @return mixed
     */
    function filter($source, $index)
    {
        return filter_input($source, $index);
    }
}

if (!function_exists('server')) {
    /**
     * @param string $index
     * @return mixed
     */
    function server($index)
    {
        return filter(INPUT_SERVER, $index);
    }
}

if (!function_exists('path')) {
    /**
     * @param array $arguments
     * @return string
     */
    function path(...$arguments)
    {
        return implode('/', $arguments);
    }
}

if (!function_exists('out')) {
    /**
     * @param mixed $values
     */
    function out(...$values)
    {
        print implode(' ', array_map(function ($value) {
            return parse($value);
        }, $values));
    }
}

if (!function_exists('parse')) {
    /**
     * @param mixed $value
     * @return string
     */
    function parse($value)
    {
        $handlers = [
            TYPE_BOOLEAN => function ($value) {
                return $value ? 'true' : 'false';
            },
            TYPE_INTEGER => function ($value) {
                return trim($value);
            },
            TYPE_FLOAT => function ($value) {
                return trim($value);
            },
            TYPE_STRING => function ($value) {
                return trim($value);
            },
            TYPE_ARRAY => function ($value) {
                return json_encode($value);
            },
            TYPE_OBJECT => function ($value) {
                return json_encode($value);
            },
            TYPE_RESOURCE => function ($value) {
                return json_encode($value);
            }
        ];
        $type = gettype($value);
        if (isset($handlers[$type])) {
            return $handlers[$type]($value);
        }
        return '';
    }
}

if (!function_exists('coalesce')) {
    /**
     * @param array ...$arguments
     * @return mixed
     * @throws ErrorException
     */
    function coalesce(...$arguments)
    {
        foreach ($arguments as $argument) {
            if (!is_null($argument)) {
                return $argument;
            }
        }
        throw new ErrorException("Can't resolve coalesce options");
    }
}

if (!function_exists('prop')) {
    /**
     * @param mixed $value
     * @param string|int $property (null)
     * @param mixed $default (null)
     *
     * @return mixed
     */
    function prop($value, $property = null, $default = null)
    {
        if (is_null($property)) {
            return $default;
        }
        if (!$value) {
            return $default;
        }
        if (is_array($value) && isset($value[$property])) {
            return $value[$property];
        }
        /** @noinspection PhpVariableVariableInspection */
        if (is_object($value) && isset($value->$property)) {
            /** @noinspection PhpVariableVariableInspection */
            return $value->$property;
        }
        return $default;
    }
}

/**
 * @SuppressWarnings("ExitExpression")
 */
if (!function_exists('stop')) {
    /**
     * @param array ...$arguments
     */
    function stop(...$arguments)
    {
        ob_start();
        if (count($arguments) === 1) {
            $arguments = $arguments[0];
        }
        echo json_encode($arguments);
        $contents = ob_get_contents();
        ob_end_clean();
        out($contents);
        die;
    }
}

if (!function_exists('guid')) {
    /**
     * @param bool $brackets
     * @return string
     */
    function guid($brackets = false)
    {
        mt_srand((double)microtime() * 10000);

        $char = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);
        $uuid = substr($char, 0, 8) . $hyphen . substr($char, 8, 4) . $hyphen . substr($char, 12, 4) . $hyphen .
            substr($char, 16, 4) . $hyphen . substr($char, 20, 12);
        if ($brackets) {
            $uuid = chr(123) . $uuid . chr(125);
        }

        return $uuid;
    }
}

if (!function_exists('get')) {
    /**
     * Get a value of matrix or array using path as reference.
     * Usage: $array = ['user' => ['address' => [['city' => 'Vila Velha']]]]
     *        echo Php\get($array, 'user.address.0.city'); // Vila Velha
     *
     * @param array $context
     * @param string $path
     * @param mixed $fallback (null)
     * @return mixed|null
     */
    function get(array $context, string $path, $fallback = null)
    {
        // convert the path to an array
        // ex.: user.address.0.city
        $pieces = explode('.', $path);
        // let's go through the array
        foreach ($pieces as $piece) {
            // if a piece is broken just return fallback
            if (!isset($context[$piece])) {
                return $fallback;
            }
            // assign the context to next interaction
            $context = $context[$piece];
        }
        // all right, the job is done!
        return $context;
    }
}

if (!function_exists('set')) {
    /**
     * Set a value of matrix or array using path as reference.
     * Usage: $array = ['user' => ['address' => [['city' => 'Vila Velha']]]]
     *        $array = Php\set($array, 'user.address.0.city', 'Fortaleza');
     *        echo Php\get($array, 'user.address.0.city'); // Fortaleza
     *
     * @param array|object $context
     * @param array|string $path
     * @param mixed $new null
     * @return mixed|null
     */
    function set(array $context, string $path, $new)
    {
        $path = explode('.', $path);
        $value = null;
        $property = array_pop($path);
        foreach ($path as $piece) {
            if (!$value) {
                $value = &$context[$piece];
                continue;
            }
            if (!isset($value[$piece])) {
                $value[$piece] = [];
            }
            $value = &$value[$piece];
        }
        if (isset($value[$property])) {
            $value[$property] = $new;
        }
        return $context;
    }
}

if (!function_exists('read')) {
    /**
     * @param string $prompt
     * @param string $options
     * @return string
     */
    function read($prompt = '$ ', $options = '')
    {
        if ($options) {
            $prompt = "{$prompt} {$options}\$ ";
        }
        $reader = function () use ($prompt) {
            return readline("{$prompt}");
        };
        if (PHP_OS === 'WINNT') {
            $reader = function () use ($prompt) {
                echo $prompt;
                return stream_get_line(STDIN, 1024, PHP_EOL);
            };
        }
        $line = $reader();
        readline_add_history($line);

        return trim($line);
    }
}

if (!function_exists('type')) {
    /**
     * @param mixed $value
     * @param string $type
     * @return bool
     */
    function type($value, string $type)
    {
        return gettype($value) === $type;
    }
}

/**
 * @SuppressWarnings("SuperGlobals")
 */
if (!function_exists('address')) {
    /**
     * @return string
     */
    function address()
    {
        $sources = ['REMOTE_ADDR', 'HTTP_X_FORWARDED_FOR', 'HTTP_CLIENT_IP'];
        foreach ($sources as $source) {
            if (isset($_SERVER[$source])) {
                return $_SERVER[$source];
            }
        }
        return 'x.x.x.x';
    }
}
