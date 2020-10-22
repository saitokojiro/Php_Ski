<?php

namespace App\model;

use App\model;

class Participants
{
    public function find(int $id)
    {
        $db = new DatabaseModel();
        $query = "SELECT participant_id FROM participant WHERE participant_id='$id';";
        $stmt= $db->dbConnexion()->query();

    }
}