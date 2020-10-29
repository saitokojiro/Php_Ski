<?php
namespace App\controller;


use App\repository\EpreuveRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class EpreuveController
{

    public $index;

    public function EpreuveList(Request $request , Response $response , TwigConfig $twig): Response
    {
        $eprRepo = new EpreuveRepository();
        $template =  $twig->twig->render('epreuveList.html.twig', ["pList" => $eprRepo->findAll]);
        $response = $response->setContent($template);
        $response = $response->sendContent();
        return $response;
    }

}