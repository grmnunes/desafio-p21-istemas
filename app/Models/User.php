<?php
namespace app\Models;

use app\Framework\Database\Connection;

class User extends Connection
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }

    public function all()
    {
        return self::$connection->query("SELECT * FROM $this->table")->fetchAll();
    }

    public function getByEmail(string $email)
    {
        $query = self::$connection->prepare("SELECT name,email,password FROM $this->table WHERE email= :email");
        $query->execute([
            'email' => $email,
        ]);

        return $query->fetchObject();
    }
}