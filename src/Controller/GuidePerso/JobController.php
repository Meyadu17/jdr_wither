<?php

namespace App\Controller\GuidePerso;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{
    #[Route('/admin/job', name: 'app_job')]
    public function index(): Response
    {
        return $this->render('job/listerJob.html.twig');
    }
}
