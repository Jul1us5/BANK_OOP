<?php

$data = file_get_contents('./../db/data.json');
$json_arr = json_decode($data, true);


foreach($json_arr as $index => $value){
    // echo '<form action="removed" method="post">';
    // echo $value['name'] . ' ' . $value['surname'] . ' ' . $value['key'] . ' ' . $value['bill'] . ' ' . 'EUR. ';
    // echo '<button name="'.$index.'" type="submit">Pašalinti</button>';
    // echo '</form>';
    echo '<form action="removed" method="post">';
    echo '<input type="text" name="id" value="'.$index.'">';
    echo '<button type="submit">Pašalinti</button>';
    echo '</form>';
}





