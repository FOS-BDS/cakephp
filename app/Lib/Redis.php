<?php

namespace App\Lib;

class Redis {

    public static $_Redis;

    /**
     * @param  [type] $func   method in Redis class https://github.com/phpredis/phpredis#classes-and-methods
     * @param  [type] $params Parameters of $func method, Notice: last params must be configName in Configure::read('Redis_Configs.' . $configName)
     * @return [type]         same as class Redis's method
     */
    public static function __callStatic($func, $params)
    {
        $configName = array_pop($params);
        if (!isset(static::$_Redis)) {
            $settings = \Configure::read('Redis_Configs.' . $configName);
            if (empty($settings)) {
                throw new \Exception('Can not read this config');
            }
            static::$_Redis = new \Redis();
            static::$_Redis->connect($settings['server'], $settings['port'], $settings['timeout']);
            static::$_Redis->setOption(\Redis::OPT_PREFIX, $settings['port']['prefix']);
            static::$_Redis->setOption(\Redis::OPT_SERIALIZER, \Redis::SERIALIZER_PHP);
        }

        return call_user_func_array(array(static::$_Redis, $func), $params);
    }
}
