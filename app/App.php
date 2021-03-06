<?php

namespace App;
// namespace VIEW\USERS;

use App\DB\JsonDb;
use App\Login;
use VIEW\USERS;
use App\DB\JsonDb as DB;
use App\DB\MySQL;
use Ramsey\Uuid\Uuid;

class App
{
    const DIR = '/PHP/BANK_OOP/public';
    const VIEW_DIR = './../view/';
    const URL = 'http://192.168.64.3/PHP/BANK_OOP/public/';
    private static $params = [];
    private static $message; // !!!!
    private static $defend = ['slaptas-1', 'show', 'create', 'showAll', 'delete']; // Apsaugoti failai

    public static function start()
    {

        session_start();
        Style::head();
        $param = str_replace(self::DIR, '', $_SERVER['REQUEST_URI']);
        self::$params = explode('/', $param);

        // $db = new DB;
        $db = new MySQL;

        if (count(self::$params) == 3) {
            if (self::$params[1] == 'users') {
                if (in_array(self::$params[2], self::$defend)) {
                    if (!Login::auth()) {
                        self::redirect('login');
                    }
                }
                if (self::$params[2] == 'addUser') {
                    $newUser = User::createNew();
                    self::$message = 'Vartotojas sukurtas';
                    $db->create($newUser);
                    self::redirect('users/showAll');
                }
                if (isset($_POST['delete'])) {
                    $deleteUser = User::deleteUser();
                    $string = implode(", ", $deleteUser);
                    $db->delete($string);
                    self::$message = 'Vartotojas pašalintas';
                }
                if (isset($_POST['plus'])) {
                    $data = MySQL::show($_SESSION['id']);
                    $data['bill'] += $_POST['name'];
                    self::$message = 'Pinigai prideti ';
                    $db->update($_SESSION['id'], $data);
                }
                if (isset($_POST['minus'])) {
                    $data = MySQL::show($_SESSION['id']);
                    if ($data['bill'] > 0) {
                        $data['bill'] -= $_POST['name'];
                        self::$message = 'Pinigai nuskaičiuoti';
                    } else {
                        self::$message = 'Sąskaitoje per mažai pinigų..';
                    }
                    if ($data['bill'] < 0) {
                        self::$message = 'Sąskaitoje per mažai pinigų..';
                    } else {
                        $db->update($_SESSION['id'], $data);
                    }
                }

                if (self::$params[2] == 'logout') {
                    session_destroy();
                    header('Location: http://192.168.64.3/PHP/BANK_OOP/public/login');
                    die();
                }
                Style::end();
                if (file_exists(self::VIEW_DIR . self::$params[1] . '/' . self::$params[2] . '.php')) {
                    require(self::VIEW_DIR . self::$params[1] . '/' . self::$params[2] . '.php');
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
            if (in_array(self::$params[1], self::$defend)) {
                if (!Login::auth()) {
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
    public static function Message()
    {
        return self::$message;
    }
}