<?php
namespace app\Framework\Database;

use PDO;

class Connection
{
    protected static $connection;

    public function __construct()
    {
        $this->getConnection();
    }
    
    public static function getConnection()
    {
        self::$connection = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    }
}