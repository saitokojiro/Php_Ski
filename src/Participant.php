<?php
/*
 * id: Int
    -photo:Int
    -prenom: String
    -nom: String
    -date_de_naissance: DateTime
    -age: Interger
    -categorie: String
    -profil: String
    +nouveau_participant()
    +suppression_participant()
 * */
namespace App;

class Participant {


    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Start param is empty !
     */

    private $prenom;
    private $nom;
    private $age;


    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        if(!preg_match("/^[a-zA-Z]+$/", $prenom)){

            throw new \InvalidArgumentException('containe number');
        }
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        if(!preg_match("/^[a-zA-Z]+$/", $nom)){

            throw new \InvalidArgumentException('containe number');
        }
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        if(!preg_match("/^[0-9]+$/", $age)){

            throw new \InvalidArgumentException('containe alpha');
        }
        $this->age = $age;
    }



}