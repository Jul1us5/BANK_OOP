<?php

namespace App;

class App
{
    const DIR = '/PHP/BANK_OOP/public';
    const VIEW_DIR = './../view/';
    private static $params = [];

    public static function start()
    {

        $param = str_replace(self::DIR, '', $_SERVER['REQUEST_URI']);
        self::$params = explode('/', $param);

        if (file_exists(self::VIEW_DIR.self::$params[1].'.php')) {
            require(self::VIEW_DIR.self::$params[1].'.php');
        }
    }


    public static function getParams()
    {
        return self::$params;
    }
}
