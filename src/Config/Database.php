<?php

namespace MVC\Config;

use MVC\Config\DatabaseInterface;
use PDO;

class Database implements DatabaseInterface
{
    private static $bdd = null;

    private function __construct()
    {
    }

    public static function getBdd()
    {
        if (is_null(self::$bdd)) {
            //database connect config
            self::$bdd = new PDO("mysql:host=localhost;dbname=mvc", 'root', '');
        }
        return self::$bdd;
    }
}
