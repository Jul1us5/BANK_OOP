<?php

namespace App;

use App\DB\JsonDb as DB;
use App\Style;

echo '<div class="main">';
echo '<div class="title">';
echo '<h1>Sąrašas</h1>';
echo '</div>';
echo '<div class="top">';
echo '<span>ID</span>';
echo '<span>VARDAS</span>';
echo '<span>PAVARDĖ</span>';
echo '<span>SĄSKAITOS NR.</span>';
echo '<span>ASMENS KODAS</span>';
echo '<span>Eur.</span>';
echo '</div>';

$data = DB::showAll();
if(!empty($data)) {
    foreach ($data as $key => $value) {
        echo '<span>' .$key .'</span><span>'. $value['name'] .'</span><span>'. $value['surname'] .'</span><span>'. $value['id'] .'</span><span>'. $value['key'] .'</span><span>'. $value['bill'] . '.00 €</span><br/>';
    }
} else {
    echo "<div class='message'>";
    echo "Sąrašas kolkas tuščias..";
    echo "</div>";
}
echo '</div>';
Style::side();
