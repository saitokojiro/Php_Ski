<?php
namespace App\controller;

class ParticipantController
{

    public $index;

    public function participantView()
    {
        $twig = new TwigConfig();
        echo $twig->twig->render('participantList.html.twig', []);
    }

}