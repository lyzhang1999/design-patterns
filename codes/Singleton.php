<?php
/**
 *
 * User: weiwang
 * Date: 2019-07-08
 * Email: <434533508@qq.com>
 *
 */

/*
 * 单例模式
 */

class Singleton
{
    private static $instance;
    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (static::$instance == null)
        {
            static::$instance == new Singleton();
        }
        return static::$instance;
    }
}

//客户端
$s1 = Singleton::getInstance();
$s2 = Singleton::getInstance();
if ($s1 == $s2)
{
    echo "same class";
}

/*
 * 单例模式：保证一个类仅有一个实例，并提供一个访问全局的访问点
 * 比如连接MYSQL或者REDIS，都可以用单例模式
 */