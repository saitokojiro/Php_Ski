<?php

namespace App\controller;


use App\model\DatabaseModel;
use App\repository\EpreuveRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EpreuveController extends DatabaseModel
{

    public $eprRepo;
    public $twig;

    function __construct()
    {
        $this->eprRepo = new EpreuveRepository();
        $this->twig = new TwigConfig();
        //$this->download = new CsvController();
    }


    public function epreuveList(Request $request, Response $response): Response
    {
        $contentPage = $this->twig->twig->render('epreuveList.html.twig', ["pList" => $this->eprRepo->findAll()]);
        $response = $response->setContent($contentPage);
        return $response;
    }

    public function epreuveSelected(Request $request, Response $response): Response
    {
        $request = Request::createFromGlobals();
        $url = explode('=', $request->getPathInfo());
        $contentPage = $this->twig->twig->render('epreuveManagement.html.twig', ["pList" => $this->eprRepo->find($url[1])]);
        $response = $response->setContent($contentPage);
        return $response;
    }

}