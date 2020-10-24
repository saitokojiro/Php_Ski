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

/*
        if(preg_match("/^[0-9]+$/", $id)){

            $conv = intval($id);
            //$db = new DatabaseModel();
           // $conv = intval($id);
            $query = "SELECT * FROM participants WHERE id='$conv';";
            $stmt= self::$pdo->prepare($query)->execute();

            $result = $stmt->fetchAll();
            return $result;
        }
*/

        /*
          $conv = intval($id);
            //$db = new DatabaseModel();
           // $conv = intval($id);
            $query = 'SELECT * FROM participants WHERE id = ?';

            $stmt= self::$pdo->prepare($query);
            $req = $stmt->execute(array($id));
            $result = $req->fetch();
            return $result;
         */

    }

    public static function findAll()
    {
        //$db = new DatabaseModel();
        $query = "SELECT * FROM participants";
        $stmt= self::$pdo->prepare($query);
        $stmt->execute();

       // return var_dump($result[1]);
        //var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}