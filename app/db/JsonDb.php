<?php
namespace App\DB;

use App\DB\DataBase;
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
        $uuid = (string) Uuid::uuid4();
        $this->data[$uuid] = $userData;
        $this->save();
    }
 
    public function update(string $userId, array $userData) : void
    {
        
    }
 
    public function delete(string $userId) : void
    {
        // $uuid = (string) Uuid::uuid4();
       
        
        unset($this->data[$userId]);

        // $this->data[$uuid] = $userId;
        $this->save();
    }
 
    public function show(string $userId) : array
    {
        return [];
    }
    
    public function showAll() : array
    {
        return [];
    }
    private function save()
    {
        file_put_contents('./../db/data.json', json_encode($this->data));
    }


}