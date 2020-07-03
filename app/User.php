<?php
namespace App;

class User
{
    public static function createNew()
    {
        return ['name' => $_POST['name'], 'surname' => $_POST['surname'], 'key' => $_POST['key'], 'bill' => 0, 'pass' => md5($_POST['pass'])];
    }
}