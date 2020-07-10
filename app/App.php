<?php

namespace App;
// namespace VIEW\USERS;

use App\DB\JsonDb;
use App\Login;
use VIEW\USERS;
use App\DB\JsonDb as DB;
use Ramsey\Uuid\Uuid;

class App
{
    const DIR = '/PHP/BANK_OOP/public';
    const VIEW_DIR = './../view/';
    const URL = 'http://192.168.64.3/PHP/BANK_OOP/public/';
    private static $params = [];

    private static $defend = ['slaptas-1']; // Apsaugoti failai

    public static function start()
    {
        session_start();

        $param = str_replace(self::DIR, '', $_SERVER['REQUEST_URI']);
        self::$params = explode('/', $param);
        new JsonDb;
       

        if (count(self::$params) == 3) {
            if (self::$params[1] == 'users') {
                
                
                if (self::$params[2] == 'addUser') {
                    $newUser = User::createNew();
                    echo 'Vartotojas pridėtas';
                    $db = new DB;
                    $db->create($newUser);
                }






                
    
                if (file_exists(self::VIEW_DIR.self::$params[1].'/'.self::$params[2].'.php')) {
                    require(self::VIEW_DIR.self::$params[1].'/'.self::$params[2].'.php');
                    
                }
            }
        } else if (count(self::$params) == 2) {
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
