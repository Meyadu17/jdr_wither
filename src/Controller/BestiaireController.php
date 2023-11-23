<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/bestiaire', name: 'app_bestiaire')]
class BestiaireController extends AbstractController
{
    #[Route('/', name: '_lister')]
    public function index(): Response
    {
        return $this->render('bestiaire/bestiaire.html.twig');
    }

    #[Route('/consulter', name: '_consulter')]
    public function consulter(): Response
    {
        return $this->render('bestiaire/consulterBestiaire.html.twig');
    }
    #[Route('/editer', name: '_editer')]
    public function editer(): Response
    {
        return $this->render('bestiaire/editerBestiaire.html.twig');
    }
}
