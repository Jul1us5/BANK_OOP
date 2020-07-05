<?php

$data = file_get_contents('./../db/data.json');
$json_arr = json_decode($data, true);



foreach($json_arr as $index => $value){
    echo '<form action="showUser" method="post">';
    echo '<input type="text" name="id" value="'.$index.'">';
    echo '<button type="submit">Rodyti</button>';
    echo '</form>';
}