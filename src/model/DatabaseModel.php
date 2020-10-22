<?php

namespace App\model;
use Pimple\Container;

use PDO;
use PDOException;

class DatabaseModel
{

    public $pdo;

    function __construct(PDO $pdo )
    {
        $this->pdo = $pdo;
    }

/*
    public function dbConnexion()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=compets_management; charset=utf8'[, 'root'[, '']]);
        } catch (PDOException $e) {
            var_dump('error :' . $e);
        }
    }*/


}