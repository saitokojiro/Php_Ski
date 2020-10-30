<?php

namespace App\repository;

use App\model;
use PDO;
use Pimple\Container;

class EpreuveRepository extends model\DatabaseModel
{
    public static $pdo;

    public function __construct()
    {
        self::$pdo = parent::getPdo();
    }

    public static function find(int $id)
    {
        $stmt = self::$pdo->prepare('SELECT * FROM participants WHERE id = ?');
        $stmt->execute(array($id));

        return $stmt->fetch();
    }

    public static function findAll()
    {
        $query = "SELECT e.id , nom ,c.categorie ,pa.profil, lieu, lifeDate   FROM epreuves e INNER JOIN categories c on e.categorie = c.id  INNER JOIN  profils pa on e.profil = pa.id";
        $stmt = self::$pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}