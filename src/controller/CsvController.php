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
        $fp = fopen('php://output','w+');
        $templateCsv = array('id', 'nom','prenom','photo','categorie', 'profil','email','date_de_naissance', 'passage' ,'passage 1 ', 'passage 2');
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
        $addall = new Participant();
        /** @var UploadedFile $uploadfile*/
        $uploadfile = $request->files->get('csv');
        if($uploadfile == null)
        {
            echo $twig->twig->render('test.html.twig');
        }else{
            $csvDataJson = $this->csvAll($uploadfile);
            for($i = 0 ; $i<count($csvDataJson); $i++)
            {
                $addall->setNom($csvDataJson[$i]->nom);
                $addall->setPrenom($csvDataJson[$i]->prenom);
                dump($addall->getAllVal());
            }
            echo $twig->twig->render('test.html.twig');
        }
    }

    public function convertorJs($array)
    {
        $jsonEncode = json_encode($array);
        return json_decode($jsonEncode);
    }

    public function replaceValue($array , $find , $replace)
    {
        if(strpos($array, ';') == true )
        {
            $array = str_replace($find,$replace, $array);
        }
        return $array;
    }

    public function csvControl($arrayCsvMain){
        $lines = explode("\n", $arrayCsvMain);
        $head = str_getcsv(array_shift($lines));
        $arrayCsv = array();
        foreach ($lines as $line) {
            if(!$line == false)
            {
                $arrayCsv[] = array_combine($head, str_getcsv($line));
            }
        }
        return $arrayCsv;
    }
    public function csvAll($uploadfile)
    {
        $csvData = file_get_contents($uploadfile);
        $csvDatas = $this->replaceValue($csvData, ";", ",");
        $arrayCsv = $this->csvControl($csvDatas);
        $csvDataJson = $this->convertorJs($arrayCsv);
        return $csvDataJson;
    }
}