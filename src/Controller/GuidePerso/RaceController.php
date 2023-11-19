<?php

namespace App\Controller\GuidePerso;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RaceController extends AbstractController
{
    #[Route('/admin/race', name: 'app_race')]
    public function index(): Response
    {
        return $this->render('race/listerJob.html.twig');
    }
}
