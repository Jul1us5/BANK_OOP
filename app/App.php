<?php

namespace App;

class App
{
    const DIR = '/PHP/BANK_OOP/public';
    private static $params = [];

    public static function start()
    {

        $param = str_replace(self::DIR, '', $_SERVER['REQUEST_URI']);
        self::$params = explode('/', $param);

        // var_dump($params);
    }


    public static function getParams()
    {
        return self::$params;
    }

    
}
