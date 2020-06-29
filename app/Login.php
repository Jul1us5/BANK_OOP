<?php
namespace App;

    class Login
    {
        private $loginResult = false;

        public function __construct()
        {
        
            $data = [
                ['name' => 'Julius', 'pass' => md5('12345')],
            ];
            
            if (!empty($_POST)) {
                foreach ($data as $user) {
                    if ($user['name'] === $_POST['user'] &&
                    $user['pass'] === md5($_POST['password'])) {
                        $_SESSION['login'] = 1;
                        $this->loginResult = true;
                    }
                }
            }
        }
    }
