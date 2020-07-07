<?php
namespace App;

use App\DB\JsonDb;


$Json = new JsonDb;
$data = $Json->showAll();

foreach($data as $index => $value){
    echo '<form action="removed" method="post">';
    echo $value['name'] . ' ' . $value['surname']. ' <b>#</b>' . $value['id'] . ' ' . $value['key']. ' ' . $value['bill'] . ' Eur.';
    echo '<button name="id" value="'.$index.'" type="submit">Pašalinti</button>';
    echo '</form>';
} 
