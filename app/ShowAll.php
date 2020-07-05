<?php
namespace App;

class ShowAll
{

    
    public static function showAll()
    {
        
        $data = file_get_contents('./../db/data.json');
        $json_arr = json_decode($data, true);
        
        $count = 1;
        foreach ($json_arr as $index => $value) {
            echo '<b>' . $count . '</b> ' . $value['name'] . ' ' . $value['surname'] . ' ' . $value['id'] . ' ' . $value['key'] . ' ' . $value['bill'] . ' ' . 'EUR.<br>';
            $count++;
        }
    }
}
