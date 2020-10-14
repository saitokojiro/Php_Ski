<?php

namespace App;

class Epreuve
{

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Start param is empty !
     */

    private $id;
    private $nom;
    private $categorie;
    private $profil;
    private $lieu;
    private $date;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
        var_dump(!preg_match("/^[a-zA-Z]+$/", $nom));
        $this->nom = $nom;

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

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     */
    public function setLieu($lieu)
    {
        if(!preg_match("/^[a-zA-Z]+$/", $lieu)){

            throw new \InvalidArgumentException('containe number');
        }
        $this->lieu = $lieu;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {

        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {

        $this->date = $date;
    }




}