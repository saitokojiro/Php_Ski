<?php

namespace App\model;

class DatabaseModel
{
    public function dbConnexion()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=compets_management; charset=utf8', 'root', '');
        } catch (PDOException $e) {
            var_dump('error :' . $e);
        }
    }
}