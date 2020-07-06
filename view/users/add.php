<?php

$data = file_get_contents('./../db/data.json');
$json_arr = json_decode($data, true);


foreach($json_arr as $index => $value){
    echo $index;
    echo '<form action="update" method="post">';
    echo '<input type="text" name="id" value="'.$index.'">';
    echo '<input type="text" name="val" value="">';
    echo '<button type="submit">Prideti</button>';
    echo '</form>';
}
