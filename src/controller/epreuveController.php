<?php
namespace App\controller;

class EpreuveController
{

    public $index;

    public function epreuveList()
    {
        $twig = new TwigConfig();
        echo $twig->twig->render('epreuveList.html.twig', []);
    }

}