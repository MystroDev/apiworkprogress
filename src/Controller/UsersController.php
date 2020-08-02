<?php

namespace App\Controller;
header("Access-Control-Allow-Origin: *");
use App\Entity\User;
use App\Entity\Niveau;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UsersController extends AbstractController
{
    /**
     * @Route("/users", name="getutilisateurs")
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


    /**
     * @Route("/users/create", name="createUtilisateur")
     */

    public function createUtilisateur() :response
    
    {

        $entityManager = $this->getDoctrine()->getManager();

        $utilisateurs = new User();
        $utilisateurs->setPrenom('Keyboard');
        $utilisateurs->setNom(1999);
        $utilisateurs->setMatricule(1999);
        $utilisateurs->setPassword(1999);
        $utilisateurs->setStatut(1999);
        $utilisateurs->setTitulaire(1999);
        $utilisateurs->setResponsable(1999);
        $utilisateurs->setDateembauche(1999);
        $utilisateurs->setActive(1999);
        $utilisateurs->setIdcategorie(1999);
        $utilisateurs->setIdniveau(1999);
        $utilisateurs->setPhoto(1999);


        $entityManager->persist($utilisateurs);

        $entityManager->flush();

        return new Response('Saved new product with id '.$utilisateurs->getId());
    }

    
}
