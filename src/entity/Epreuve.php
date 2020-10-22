<?php

namespace App\entity;

class Epreuve
{

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Start param is empty !
     */


    private $nom;
    private $date;

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
    public function getDate()
    {

        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {

        $currentDate = date("d-m-Y");
        $tmstp1 = strtotime($date);
        $tmstp2 = strtotime($currentDate);



        if($tmstp1 < $tmstp2){
            throw new \InvalidArgumentException('date dépasser');
            //$this->date = $date;
        }elseif($tmstp1 == $tmstp2){

            $this->date = $date;
        }else{
            $this->date = $date;
        }


        //$this->date = $date;
    }




}