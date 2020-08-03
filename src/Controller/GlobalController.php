<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GlobalController extends AbstractController
{
    /**
     * @Route("/global", name="global")
     */
    public function index()
    {
        return $this->render('global/index.html.twig', [
            'controller_name' => 'GlobalController',
        ]);
    }
}
