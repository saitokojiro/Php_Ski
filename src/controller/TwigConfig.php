<?php
namespace App\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigConfig
{
    public $loader;
    public $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader('src/view');
        $this->twig = new Environment($this->loader, []);
        return $this->twig;
    }
}