<?php

namespace App;

use App\DB\JsonDb as DB;


$data = DB::json();

echo '<div class="main">';
echo '<div class="title">';
echo '<h1>Peržiureti</h1>';
echo '</div>';
echo '<div class="top"></div>';

echo '<div class="table">';






if (self::$params[2] == 'show') {



    echo '<div class="row">';
    echo '<form action="" method="post">';
    echo '<b>ID: </b><input type="text" name="id" value="">';
    echo '<button type="submit">Rodyti</button>';
    echo '</form>';
    echo '</div>';
    
}


echo App::Message();
if (isset($_POST['id'])) {
    if (array_key_exists($_POST['id'], $data)) {
        $_SESSION['id'] = $_POST['id'];
        $data = DB::show($_POST['id']);

        echo '<div class="show">';
        echo '<span><b>VARDAS:</b> ' . $data['name'] . '<br/></span>';
        echo '<span><b>PAVARDĖ:</b> ' . $data['surname'] . '<br/></span>';
        echo '<span><b>SĄSKAITOS NR.:</b> ' . $data['id'] . '<br/></span>';
        echo '<span><b>ASMENS KODAS:</b> ' . $data['key'] . '<br/></span>';
        echo '<span><b>Eur.:</b> ' . $data['bill'] . ' €<br/></span>';
        echo '</div>';

        echo '<form action="" method="post">';
        echo '<input type="hidden" id="id" name="id" value="' . $_POST['id'] . '">';
        echo '<button type="submit" id="x" name="delete" value="delete">Delete</button>';
        echo '</form>';
        echo '<form action="" class="for" method="post">';
        echo '<input name="name" value="">';
        echo '<button type="submit" name="plus" value="plus">+</button>';
        echo '<button type="submit" name="minus" value="minus">-</button>';
        echo '</form>';
        echo 'Arba';
    } else {
        if(self::Message() == true) {
        } else {
            echo '<div class="message">';
            echo "Tokio ID nera..";
            echo '</div>';
        }

    }
}


echo '</div>';
echo '</div>';
Style::side();
