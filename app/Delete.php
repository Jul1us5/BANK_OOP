<?php
namespace App;

class Delete
{
    public static function deleteUser()
    {   
        return ['id' => $_POST['id']];   
    }
}