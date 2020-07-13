<?php
namespace App;

use App\DB\JsonDb as DB;

class User
{
    
    public function createNew()
    {
        return ['firstname' => $_POST['name'], 'lastname' => $_POST['surname'], 'counts' => rand(11111,99999), 'code' => $_POST['key'], 'bill' => 0, 'pass' => md5($_POST['pass'])];
    }
    public function deleteUser()
    {
        return ['id' => $_POST['id']];
    }
}
