<?php

namespace App\Controller;
header("Access-Control-Allow-Origin: *");
use DateTime;
use App\Entity\User;
use App\Entity\Niveau;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UsersController extends AbstractController
{
    /**
     * @Route("/users", name="users")
     * @Method({"GET"})
     */
    public function users()
    
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
     * @Route("/user/create", name="createUtilisateur", methods={"POST"})
     */

    public function createUtilisateur(Request $request) :response
    
    {
        $donnees = json_decode($request->getContent());

        if (!empty($donnees)) {


        $entityManager = $this->getDoctrine()->getManager();
        $utilisateurs = new User();
        $utilisateurs->setPrenom($donnees->{'prenom'});
        $utilisateurs->setNom($donnees->{'nom'});
        $utilisateurs->setMatricule($donnees->{'matricule'});
        $utilisateurs->setPassword($donnees->{'password'});
        $utilisateurs->setStatut($donnees->{'statut'});
        $utilisateurs->setTitulaire($donnees->{'titulaire'});
        $utilisateurs->setResponsable($donnees->{'responsable'});
        $utilisateurs->setDateembauche(new \Date($donnees->{'dateembauche'}) );
        $utilisateurs->setActive($donnees->{'active'});
        $utilisateurs->setIdcategorie($donnees->{'idcategorie'});
        $utilisateurs->setIdniveau($donnees->{'idniveau'});
        $entityManager->persist($utilisateurs);

        $entityManager->flush();
              
        return new Response('ok', 201);
    }
     
    return new Response('Failed', 404);
  
    }

    /**
    * @Route("/user/editer/{id}", name="editer")
    * @Method({"PUT"})
    */
    public function editer($id,Request $request)
    {

        $donnees = json_decode($request->getContent());

        if (!empty($donnees)) {


        $entityManager = $this->getDoctrine()->getManager();
        $utilisateurs = $entityManager->getRepository(user::class)->find($id);
    
        if (!$utilisateurs) {
            throw $this->createNotFoundException(
                'No user found for id '.$id
            );
        }
    
        
        $utilisateurs->setPrenom($donnees->{'prenom'});
        $utilisateurs->setNom($donnees->{'nom'});
        $utilisateurs->setMatricule($donnees->{'matricule'});
        $utilisateurs->setPassword($donnees->{'password'});
        $utilisateurs->setStatut($donnees->{'statut'});
        $utilisateurs->setTitulaire($donnees->{'titulaire'});
        $utilisateurs->setResponsable($donnees->{'responsable'});
        $utilisateurs->setDateembauche(new \Date($donnees->{'dateembauche'}) );
        $utilisateurs->setActive($donnees->{'active'});
        $utilisateurs->setIdcategorie($donnees->{'idcategorie'});
        $utilisateurs->setIdniveau($donnees->{'idniveau'});
    

        $entityManager->flush();
    
        return new Response('ok');

        }

}



    /**
    * @Route("/user/delete/{id}", name="delete", methods={"DELETE"})
    */
    public function removeArticle(user $utilisateurs)
    {
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($utilisateurs);
    $entityManager->flush();
    return new Response('ok');
    }

     
}
