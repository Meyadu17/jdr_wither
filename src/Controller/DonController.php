<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/don', name: 'app_admin_don')]
class DonController extends AbstractController
{
    const MESSAGE = "Le don";

    #[Route('/ajouter', name: '_ajouter')]
    #[Route('/modifier/{id}', name: '_modifier')]
    public function index(): Response
    {
        return $this->render('competenceCombat/don/editerDon.html.twig');
    }
}
