<?php

namespace App\Controller\GuidePerso;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HandicapController extends AbstractController
{
    #[Route('/handicap', name: 'app_handicap')]
    public function index(): Response
    {
        return $this->render('handicap/listerJob.html.twig', [
            'controller_name' => 'HandicapController',
        ]);
    }
}
