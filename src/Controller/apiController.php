<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\HttpClient\HttpClient;

class apiController extends AbstractController
{
    
          public function index(InputInterface $input, OutputInterface $output)
    {
         
$url = "https://gorest.co.in/public-api/users";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);



$resp = curl_exec($curl);
curl_close($curl);
$resp=json_decode($resp);
//var_dump($resp->data);
$arr = $resp->data;
$a=$arr[0];

$table = new Table($output);
        $table->setHeaders(['Id', 'Name', 'Email','Gender','status','created_at','updated_at']);
                foreach($arr as $a){
                foreach($a as $row){
                    $table->setRows([[$a->id],[$a->name],[$a->eamil],[$a->Gender],[$a->status],[$a->created_at],[$a->updated_at]]);
                };};
                
          
        ;
        $table->render();
        return $this->render('Apitemp.html.twig');
      
}
}

    
    
    
    
    
