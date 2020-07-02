<?php
namespace App\DB;
 
interface DataBase
{
    function create(array $userData) : void;
 
    function update(string $userId, array $userData) : void;
 
    function delete(string $userId) : void;
 
    function show(string $userId) : array;
    
    function showAll() : array;
}
