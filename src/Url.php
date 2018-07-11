<?php

namespace Php;

/**
 * Class Url
 */
abstract class Url
{
    /**
     * @var string
     */
    const REF = 'index.php/';

    /**
     * @return string
     */
    public static function host()
    {
        $self = static::self();
        $query = static::query();
        $start = '';
        if ($self !== $query) {
            $start = static::start($self);
        }
        return server('HTTP_HOST') . $start;
    }

    /**
     * @return string
     */
    public static function current()
    {
        $self = static::self();
        $query = static::query();
        if ($self !== $query) {
            $start = static::start($self);
            $search = '/' . preg_quote($start, '/') . '/';
            $query = preg_replace($search, '', $query, 1);
        }
        return $query;
    }

    /**
     * @return mixed
     */
    private static function self()
    {
        return str_replace(static::REF, '', server('PHP_SELF'));
    }

    /**
     * @return string
     */
    private static function query()
    {
        return server('QUERY_STRING') ? server('QUERY_STRING') : '';
    }

    /**
     * @param $self
     * @return string
     */
    private static function start($self)
    {
        $pieces = explode('/', $self);
        array_pop($pieces);
        return implode('/', $pieces);
    }
}
