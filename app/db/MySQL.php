<?php

namespace App\DB;

use Ramsey\Uuid\Uuid;


class MySQL implements DataBase
{

    public static $pdo;


    public function __construct()
    {
        $host = '127.0.0.1';
        $db   = 'bankas';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            self::$pdo = new \PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }

        try {
            // sql to create table
            $sql = "CREATE TABLE IF NOT EXISTS Bank_List (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                counts CHAR(30) NOT NULL,
                code CHAR(30) NOT NULL,
                bill CHAR(30) NOT NULL,
                pass CHAR(30) NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
            // use exec() because no results are returned
            self::$pdo->exec($sql);
            // echo "Table list created successfully";
        } catch (\PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    function create(array $userData): void
    {

        $sql = "INSERT INTO Bank_List (firstname, lastname, counts, code, bill, pass) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([
            $name = $userData['firstname'], 
            $surname = $userData['lastname'],
            $id = $userData['counts'],
            $key = $userData['code'], 
            $bill = $userData['bill'],
            $pass = $userData['pass']
            ]);
    }


    function update(int $userId, array $userData): void
    {
    }

    function delete(int $userId): void
    {
    }

    function show(int $userId): array
    {
        return [];
    }

    function showAll(): array
    {
        $sql = "SELECT * FROM Bank_List";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        return (array) $stmt->fetchAll();
    }
    
}
