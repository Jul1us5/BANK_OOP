<?php

namespace App;

use App\DB\JsonDb as DB;

class Style
{
    public function head(): void
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- <link rel="stylesheet" href="./style/font-awesome.min.css"> -->
            <link rel="stylesheet" href="http://192.168.64.3/PHP/BANK_OOP/public/style/reset.css">
            <link rel="stylesheet" href="http://192.168.64.3/PHP/BANK_OOP/public/style/main.css">
            <title>BANK Application</title>
        </head>

        <body>
        <?php
    }
    public function end(): void
    {
        ?>
        </body>

        </html>
    <?php
    }
    public function side(): void
    {
    ?>
        <div class="side">
            <a href="http://192.168.64.3/PHP/BANK_OOP/public/users/logout">Atsijungti</a>
            <div class="nav">
                <a href="http://192.168.64.3/PHP/BANK_OOP/public/users/showAll">Sąrašas</a>
                <a href="http://192.168.64.3/PHP/BANK_OOP/public/users/show">Peržiureti</a>
                <a href="http://192.168.64.3/PHP/BANK_OOP/public/users/create">Pridėti naują</a>
                <!-- <a href="http://192.168.64.3/PHP/BANK_OOP/public/users/show">Redaguoti</a> -->
                <a href="http://192.168.64.3/PHP/BANK_OOP/public/slaptas-1">Pagrindinis</a>
            </div>

        </div>
<?php
    }
}
