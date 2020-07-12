<?php
namespace App;

use App\Style;

echo '<div class="main">';
echo '<div class="title">';
echo '<h1>Pridėti naują</h1>';
echo '</div>';
echo '<div class="top"></div>';

echo '<div class="table">';
echo '<div class="add">';

?>
<form action="addUser" method="post">
<input type="text" pattern="[A-Za-z]{3,20}" title="Blogai užpildytas laukas" name="name" required>Vardas<br>
<input type="text" pattern="[A-Za-z]{3,20}" title="Blogai užpildytas laukas" name="surname" required>Pavardė<br>
<input type="text" pattern="[0-9]{11,11}" title="Asmens kodą sudaro 11 skaičių" name="key" required>Asmens Kodas<br>
<input type="text" pattern=".{5,}" title="Per trumpas slaptažodis" name="pass" required>Slaptažodis<br>
<button type="submit">Pridėri</button>
</form>


<?php



echo App::Message();

echo '</div>';
echo '</div>';
echo '</div>';
Style::side();