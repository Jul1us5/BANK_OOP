<?php
namespace App;

use App\Style;

echo '<div class="main">';
echo '<div class="title">';
echo '<h1>Pridėti naują</h1>';
echo '</div>';
?>
<form action="<?= App::URL ?>users/addUser" method="post">
<?php
echo '<input type="text" name="name">Vardas<br>';
echo '<input type="text" name="surname">Pavardė<br>';
echo '<input type="text" name="key">Asmens Kodas<br>';
echo '<input type="text" name="pass">Slaptažodis<br>';
echo '<button type="submit">Pridėri</button>';
echo '</form>';


echo '</div>';
Style::side();