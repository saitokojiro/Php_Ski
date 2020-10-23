<?php


namespace App\controller;
use App\repository\ParticipantsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CsvController
{



    /**
     * Get a CSV file from an array
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function csvAction()
    {

echo "";
        $list = array(
            //these are the columns
            array('Firstname', 'Lastname',),
            //these are the rows
            array('Andrei', 'Boar'),
            array('John', 'Doe'));

        $listvide = array();

        //$fp = fopen('php://output','w', "w");

        foreach ($list as $line)
        {
            $listvide[] = implode(',', $line);
/*
            fputcsv(
                $fp, // The file pointer
                $listvide // The fields
                 // The delimiter
            );*/

        }

// $responseString contains csv result string
        $content = implode("\n", $listvide);

        $response = new Response($content);
              $response->headers->set('Content-type', 'text/csv');
              $response->headers->set('Content-Disposition', 'attachment; filename="ok.csv";');
            // $response->sendHeaders();
             // $response->setContent($content);
        //fclose($fp);

        return $response;







        /*
                foreach ($list as $line) {
                    fputcsv($file, $line);
                }
                $response = new Response();
                var_dump($file);

                fclose($file);
                var_dump($response);
                //$content = implode("\n", $list);
                /*
                $response = new Response($fp);
                $response->headers->set('Content-Encoding', 'UTF-8');
                $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
                $response->headers->set('Content-Disposition', 'attachment; filename=sample.csv');

                return $response;
        */


        /*
        $list = array(
            //these are the columns
            array('Firstname', 'Lastname',),
            //these are the rows
            array('Andrei', 'Boar'),
            array('John', 'Doe')
        );

        $fp = fopen('php://output', 'wb');

        foreach ($list as $fields) {
            fputcsv($fp, $fields);
            var_dump($fields);
        }

        $response = new StreamedResponse();;
        var_dump($response);
        fclose($fp);
        $response->headers->set('Content-Type', 'text/csv');
        //it's gonna output in a testing.csv file
        $response->headers->set('Content-Disposition', 'attachment; filename="testing.csv"');

        return $response;*/
    }
}