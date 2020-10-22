<?php

namespace App\repository;

use App\model;
use Pimple\Container;

class ParticipantsRepository
{
    function __construct($dsn)
    {

    }

    public function find(int $id)
    {
        $db = new DatabaseModel();
        $query = "SELECT * FROM participants WHERE participant_id='$id';";
        $stmt= $db->dbConnexion()->query($query);

        //return var_dump($stmt->fetch());

    }

    public function findAll()
    {
        $db = new DatabaseModel();
        $query = "SELECT * FROM participants";
        $stmt= $db->dbConnexion()->query($query);
        $result = $stmt->fetchAll();
       // return var_dump($result[1]);
        return $result;
    }
}