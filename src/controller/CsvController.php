<?php


namespace App\controller;
use App\entity\Participant;
use App\repository\ParticipantsRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class CsvController
{

    /**
     * Get a CSV file from an array
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function csvExport()
    {
        $bdd = new ParticipantsRepository();
        $fp = fopen('php://output','w', "w");
        $templateCsv = array('id', 'nom','prenom','photo','categorie', 'profil','email','date_de_naissance');
        fputcsv($fp, $templateCsv );
        foreach ($bdd->findAll() as $line)
        {
            fputcsv($fp, $line);
        }
        $response = new Response(stream_get_contents($fp));

       //$response = new Response();
        fclose($fp);
        $response->headers->set('Content-type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="ok.csv";');
        $response->sendHeaders();
        $response->getContent();

        return $response;

    }

    public function csvImport(Request $request)
    {

        $twig = new TwigConfig();
        $requestGet = $request->request;
        /*$addall = new Participant();
        $addall->setNom($requestGet->get("nom"));
        $addall->setPrenom($requestGet->get("prenom"));
        $js = json_encode($addall->getAllVal());
        *///dump($request->files->get('csv'));
        /** @var UploadedFile $uploadfile*/
         $uploadfile = $request->files->get('csv');
         $csvData = file_get_contents($uploadfile);
        $lines = explode("\n", $csvData);
        $head = str_getcsv(array_shift($lines));
        $arrayCsv = array();
        foreach ($lines as $line) {
            if(!$line == false)
            {
                $arrayCsv[] = array_combine($head, str_getcsv($line));
            }

        }

        $data = $this->convertorJs($arrayCsv);
        for($i = 0 ; $i<count($data); $i++)
        {
            dump($data[$i]);
        }



         //$uploadfile->move('depots');



       // dd();

        //if()


        echo $twig->twig->render('test.html.twig');
    }

    public function convertorJs($array)
    {
        $jsonEncode = json_encode($array);
        return json_decode($jsonEncode);
    }
}