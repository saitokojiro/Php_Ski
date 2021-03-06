<?php

namespace App\model;

use Pimple\Container;

use PDO;
use PDOException;

abstract class DatabaseModel
{

    protected static $pdo = null;

    protected static function getPdo()
    {
        if (is_null(self::$pdo)) {
            try {
                self::$pdo = new PDO('mysql:host=localhost;dbname=compets_management; charset=utf8', 'root', '');
            } catch (PDOException $e) {
                var_dump('error :' . $e);
            }
        }
        return self::$pdo;
    }
}