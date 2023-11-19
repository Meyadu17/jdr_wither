<?php

namespace App\Controller\GuidePerso;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HandicapController extends AbstractController
{
    #[Route('/epreuves', name: 'app_handicap')]
    public function index(): Response
    {
        return $this->render('epreuves/listerJob.html.twig', [
            'controller_name' => 'HandicapController',
        ]);
    }
}
