<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
header("Access-Control-Allow-Origin: *");
class UsersController extends AbstractController
{
    /**
     * @Route("/users", name="users")
     */
    public function getutilisateurs()
    
    {

        $utilisateurs = $this->getDoctrine()->getRepository(User::class)->findAll();
     
         $parametrs = [
            'page' => '1',
            'perPage' => '1',
            'totalPages' => '1',
            'data'=> $utilisateurs 

         ];

        $data =  $this->get('serializer')->serialize($parametrs, 'json');
        
        $response = new Response($data);

        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }




    
}
