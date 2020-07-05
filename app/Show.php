<?php
namespace App;

class Show
{
    public static function showUser()
    {   
        return ['id' => $_POST['id']];      
    }
}