<?php
namespace App\controller;

use App\model\DatabaseModel;
use App\repository\ParticipantsRepository;

class ParticipantController
{


    public $index;
    public $pList;

    function __construct()
    {
        $pdo = new DatabaseModel(['mysql:host=localhost;dbname=compets_management; charset=utf8', 'root', '']);
        $this->pList = new ParticipantsRepository($pdo);

    }

    public function participantView()
    {
       /* $hello = new participants();*/

        $twig = new \TwigConfig();
        var_dump($this->pList->findAll());
        echo $twig->twig->render('participantList.html.twig', ['datas' => "$hello->findAll()"]);
    }

}