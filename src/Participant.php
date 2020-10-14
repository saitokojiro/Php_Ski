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
    private $categorie;
    private $profil;


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

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        if($categorie === "M1" || $categorie === "M2" || $categorie === "M3" || $categorie === "Senior" || $categorie === "V" || $categorie === "Snow" || $categorie === "NG")
        {
            $this->categorie = $categorie;
        }
        else{
            throw new \InvalidArgumentException('categorie incorrect');
        }
    }

    /**
     * @return mixed
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * @param mixed $profil
     */
    public function setProfil($profil)
    {
        if($profil === "ASVP" || $profil === "OPEN" || $profil === "Grades")
        {
            $this->profil = $profil;
        }
        else{
            throw new \InvalidArgumentException('categorie incorrect');
        }



    }

}