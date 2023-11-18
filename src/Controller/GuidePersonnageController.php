<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/guide/personnage', name: 'app_guide_personnage')]
class GuidePersonnageController extends AbstractController
{
    #[Route('/', name: '_lister')]
    public function index(): Response
    {
        return $this->render('guidePersonnage/guidePersonnage.html.twig', [
            'controller_name' => 'GuidePersonnageController',
        ]);
    }
}
