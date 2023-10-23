<?php

namespace App\Controller\Stuff;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OutilController extends AbstractController
{
    #[Route('/outil', name: 'app_outil')]
    public function index(): Response
    {
        return $this->render('stuff/outil/listerArmure.html.twig', [
            'controller_name' => 'OutilController',
        ]);
    }
}
