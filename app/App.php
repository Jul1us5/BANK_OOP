<?php

namespace App;

use App\Login;

class App
{
    const DIR = '/PHP/BANK_OOP/public';
    const VIEW_DIR = './../view/';
    const URL = 'http://192.168.64.2/PHP/BANK_OOP/public/';
    private static $params = [];

    private static $defend = ['slaptas-1']; // Apsaugoti failai

    public static function start()
    {
        session_start();

        $param = str_replace(self::DIR, '', $_SERVER['REQUEST_URI']);
        self::$params = explode('/', $param);

        if (self::$params[1] == 'doLogin') {
            $login = new Login;

            if ($login->result()) {
                self::redirect('slaptas-1');
            } else {
                self::redirect('login');
            }
        }
        if(in_array(self::$params[1], self::$defend)) {
            if(!Login::auth()) {
                self::redirect('login');
            }
        }

        if (file_exists(self::VIEW_DIR . self::$params[1] . '.php')) {
            require(self::VIEW_DIR . self::$params[1] . '.php');
        }
    }


    public static function getParams()
    {
        return self::$params;
    }
    public static function redirect($param)
    {
        header('Location: ' . self::URL . $param);
        die();
    }
}
