<?php
class Register
{
    protected static $_objects;

    public function set($alias, $object)
    {
        static::$objects[$alias] = $object;
    }

    public function get($alias)
    {
        return static::$objects[$alias];
    }

    public function _unset($alias)
    {
        unset(static::$objects[$alias]);
    }
}
