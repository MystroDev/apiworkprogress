<?php

namespace App\Controller;

header("Access-Control-Allow-Origin: *");
use App\Entity\Categorie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{

    /**
     * @Route("/categorie", name="categorie")
     */
    public function ListeCategorie()
    
    {

        $categories = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
    
        $data =  $this->get('serializer')->serialize($categories, 'json');
        
        $response = new Response($data);

        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}
