<?php

namespace App\Controller;

use App\Entity\Niveau;
use Symfony\Component\HttpFoundation\Response;
header("Access-Control-Allow-Origin: *");
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NiveauController extends AbstractController
{
    /**
     * @Route("/niveau", name="niveau")
     */

    public function ListeNiveau()
  
    {

        $niveau = $this->getDoctrine()->getRepository(Niveau::class)->findAll();
     
        $data =  $this->get('serializer')->serialize($niveau, 'json');
        
        $response = new Response($data);

        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
