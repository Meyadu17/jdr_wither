<?php

namespace App\Controller\Stuff;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipementGeneralController extends AbstractController
{
    #[Route('/equipement/general', name: 'app_equipement_general')]
    public function index(): Response
    {
        return $this->render('stuff/equipement_general/listerArmure.html.twig', [
            'controller_name' => 'EquipementGeneralController',
        ]);
    }
}
