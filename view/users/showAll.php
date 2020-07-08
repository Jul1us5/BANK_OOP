<?php

namespace App;

use App\DB\JsonDb as DB;


$data = DB::showAll();
foreach ($data as $key => $value) {
    echo $key+1 .' '. $value['name'] .' '. $value['surname'] .' '. $value['id'] .' '. $value['key'] .' '. $value['bill'] . ' Eur. <br/>';
}
