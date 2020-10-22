<?php
namespace App\controller;

use App\model;

class ParticipantController
{

    public $index;

    public function participantView()
    {
        $twig = new TwigConfig();
        echo $twig->twig->render('participantList.html.twig', []);
    }

}