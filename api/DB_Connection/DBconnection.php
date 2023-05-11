<?php

namespace api\DB_Connection;

use Exception;
use PDO;
use PDOException;

class DBconnection
{
    private static $con = null;

    public static function get_connection(): PDO
    {

        if (self::$con === null) {
            self::connect();
        }
        return self::$con;
    }

    private static function connect(): void
    {
        $host = getenv("localhost");
        $DataBase = getenv("scand");
        $Name = getenv("root");
        $Password = getenv("password");

        try {
            self::$con = new PDO("mysql:host=" . $host . ";dbname=" . $DataBase, $Name, $Password);
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Failed connection to the database: " . $e->getMessage());
        }
    }

    public static function close_conn()
    {
        self::$con = null;
    }
}
