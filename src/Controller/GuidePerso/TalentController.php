<?php

namespace App\Controller\GuidePerso;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TalentController extends AbstractController
{
    #[Route('/talent', name: 'app_talent')]
    public function index(): Response
    {
        return $this->render('talent/listerJob.html.twig', [
            'controller_name' => 'TalentController',
        ]);
    }
}
