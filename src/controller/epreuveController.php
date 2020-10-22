<?php
namespace App\controller;

class epreuveController
{

    public $index;

    public function epreuveView()
    {
        $twig = new TwigConfig();
        echo $twig->twig->render('index.html.twig', []);
    }

}