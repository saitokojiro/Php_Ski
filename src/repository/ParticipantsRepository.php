<?php

namespace App\repository;

use App\model;
use mysql_xdevapi\Result;
use PDO;
use Pimple\Container;

class ParticipantsRepository extends model\DatabaseModel
{
    public static $pdo;
    public function __construct()
    {
        self::$pdo = parent::getPdo();
    }

    public static function find(int $id)
    {

        $stmt= self::$pdo->prepare('SELECT * FROM participants WHERE id = ?');
        $stmt->execute(array($id));

        return $stmt->fetch();

    }

    public static function findAll()
    {
        $query = "SELECT * FROM participants";
        $stmt= self::$pdo->prepare($query);
        $stmt->execute();
        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}