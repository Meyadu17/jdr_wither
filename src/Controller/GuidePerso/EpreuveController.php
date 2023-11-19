<?php

namespace App\Controller\GuidePerso;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EpreuveController extends AbstractController
{
    #[Route('/admin/epreuves', name: 'app_handicap')]
    public function index(): Response
    {
        return $this->render('epreuves/listerJob.html.twig');
    }
}
