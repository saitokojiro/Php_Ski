<?php
namespace App\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HelloController
{

    public $hello;

    public function helloTest()
    {
        $twig = new TwigConfig();
        echo $twig->twig->render('hello.html.twig',[]);
    }

    public function ErrorTest()
    {

    }
}