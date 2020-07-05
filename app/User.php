<?php
namespace App;

class User
{
    public static function createNew()
    {
        $rand = rand(11111,99999);
        return ['name' => $_POST['name'], 'surname' => $_POST['surname'], 'id' => $rand, 'key' => $_POST['key'], 'bill' => 0, 'pass' => md5($_POST['pass'])];
    }
}
