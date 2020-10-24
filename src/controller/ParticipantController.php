<?php
namespace App\controller;

use App\controller\TwigConfig;
use App\model\DatabaseModel;
use App\repository\ParticipantsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;

//use App\controller\TwigConfig;

class ParticipantController extends DatabaseModel
{


    public $index;
    public $pList;
    public $twig;
    public $download;

    function __construct()
    {
        //$pdo = new DatabaseModel(['mysql:host=localhost;dbname=compets_management; charset=utf8', 'root', '']);
        //$this->pList = new ParticipantsRepository($pdo);
        $this->pList = new ParticipantsRepository();
        $this->twig = new TwigConfig();
        $this->download = new CsvController();

    }

    public function participantsView()
    {
       /* $hello = new participants();*/


        //var_dump($this->pList->findAll());
        echo $this->twig->twig->render('participantList.html.twig', ['pList' => $this->pList->findAll()]);
    }

    public function participantView($id)
    {
        /* $hello = new participants();*/


        //$this->download->csvAction();

        //var_dump($id);
        //$convert = (int)$id;
        //$request = Request::createFromGlobals();
        //var_dump($request);
        //var_dump($this->pList->find($id));
        $request = Request::createFromGlobals();

        //var_dump($request->getPathInfo());
        $url= explode('=', $request->getPathInfo());
        //var_dump($url[1]);
        //var_dump($this->pList->find($url[1]));
        echo $this->twig->twig->render('participantId.html.twig', ['pList' => $this->pList->find($url[1])]);
    }

}