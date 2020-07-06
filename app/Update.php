<?php
namespace App;

class Update
{
    public static function updated()
    {
        return ['val' => $_POST['val'], 'id' => $_POST['id']];
    }
}