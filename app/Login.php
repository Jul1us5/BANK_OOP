<?php

namespace App;

use App\DB\JsonDb;

class Login
{
    private $loginResult = false;

    public function __construct()
    {

        $data = [
            ['name' => 'Julius', 'pass' => md5('12345')],
        ];

        if (!empty($_POST)) {
            foreach ($data as $user) {
                if (
                    $user['name'] === $_POST['user'] &&
                    $user['pass'] === md5($_POST['password'])
                ) {
                    $_SESSION['login'] = 1;
                    $this->loginResult = true;
                }
            }
        }
    }
    public function result()
    {
        return $this->loginResult;
    }
    public function logout()
    {
       
            // session_destroy();
            // header('Location: http://192.168.64.3/PHP/BANK_OOP/public');
            // die();
            // $_SESSION['login'] = false;
        
    }
    public static function auth()
    {
        return (isset($_SESSION['login']) && $_SESSION['login'] == true);
    }
}
