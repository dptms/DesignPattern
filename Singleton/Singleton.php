<?php
class Mysql
{
    private static $_instance = null; //用来存储实例的静态属性
    private function __construct()
    {
        //私有化构造方法 让对象无法在外部实例化出来
    }
    private function __clone()
    {
        //私有化克隆方法 防止克隆
    }
    public static function getInstance()
    {
        if (static::$_instance === null && !is_object(static::$_instance)) {
            static::$_instance = new static;
        }
        return static::$_instance;
    }
}
//如下取得的是同一个实例 实现单例模式
var_dump(Mysql::getInstance());
var_dump(Mysql::getInstance());
