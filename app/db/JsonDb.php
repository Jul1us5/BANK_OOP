<?php
namespace App\DB;
use App\DB\DataBase as DB;
use Ramsey\Uuid\Uuid;

class JsonDb implements DataBase
{

    private $data;
    



    public function __construct()
    {
        if (!file_exists('./../db/data.json')) {

            file_put_contents('./../db/data.json', json_encode([]));
        }
        $this->data = json_decode(file_get_contents('./../db/data.json'), 1);
    }
    
    public function create(array $userData) : void
    {
        $this->data[] = $userData;
        $this->save();
    }
 
    public function update(int $userId, array $userData) : void
    {

    }
 
    public function delete(int $userId) : void
    {        

    }
 
    public function show(int $userId) : array
    {
        $data = self::json();
        return $data[$userId];
    }
    
    public function showAll() : array
    {
        return self::json();
    }
    private function save()
    {
        file_put_contents('./../db/data.json', json_encode($this->data));
    }
    public function json(){
        return json_decode(file_get_contents('./../db/data.json'),true);
    }
    


}