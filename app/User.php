<?php

namespace App;

use App\DB\JsonDb as DB;
use App\DB\JsonDb;
use App\Login;
use Ramsey\Uuid\Uuid;

class User
{

    public function createNew()
    {
        return ['name' => $_POST['name'], 'surname' => $_POST['surname'], 'id' => rand(11111, 99999), 'key' => $_POST['key'], 'bill' => 0, 'pass' => md5($_POST['pass'])];
    }
    public function deleteUser()
    {
        return ['id' => $_POST['id']];
    }
}
