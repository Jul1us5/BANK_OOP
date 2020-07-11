<?php

namespace App;

use App\DB\JsonDb as DB;
use App\App;
use App\DB\JsonDb;

$data= DB::json();


if (self::$params[2] == 'show') {
   








  
    foreach($data as $index => $value){
        

        
        echo '<form action="show" method="post">';
        echo '<input type="text" name="id" value="'.$index.'">';
        echo '<button type="submit">Rodyti</button>';
        echo '</form>';
      

    }
}
if(isset($_POST['id'])) {
    $_SESSION['id'] = $_POST['id'];
    $data = DB::show($_POST['id']);
    foreach($data as $key => $value) {
        if($key == 'pass' ) continue;
            echo $value . '<br/>';
    }
    // echo $_POST['id'] . '<-- INDEX<br/>';
    // ...
    echo '<form action="delete" method="post">';
    echo '<input type="hidden" id="id" name="id" value="' . $_POST['id']. '">';
    echo '<button type="submit" name="delete" value="delete">Delete</button>';
    echo '</form>';
    echo '<form action="" method="post">';
    echo '<input name="name" value="">';
    echo '<button type="submit" name="plus" value="plus">+</button>';
    

  
    echo '<button type="submit" name="minus" value="minus">-</button>';
    echo '</form>';
}
echo App::Message();
