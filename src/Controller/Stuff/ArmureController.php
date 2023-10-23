<?php

namespace App\Controller\Stuff;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArmureController extends AbstractController
{
    #[Route('/armure', name: 'app_armure')]
    public function index(): Response
    {
        return $this->render('stuff/armure/listerArmure.html.twig', [
            'controller_name' => 'ArmureController',
        ]);
    }
}
