<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            $this->addFlash(
                'error',
                ' Vous devez être connecté pour accéder à cette page'
            );
            return $this->redirectToRoute('app_login');
        }
        return $this->render('accueil/accueil.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
