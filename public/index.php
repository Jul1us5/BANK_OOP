<?php

require '../vendor/autoload.php';

define('DIR', '/PHP/BANK_OOP/public');

$param = str_replace(DIR, '', $_SERVER['REQUEST_URI']);
$params = explode('/', $param);

var_dump($params);