<?php
namespace App\controller;

class IndexController
{

    public $index;

    public function index()
    {
        $twig = new TwigConfig();
        echo $twig->twig->render('index.html.twig', []);
    }

}