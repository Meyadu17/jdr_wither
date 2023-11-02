<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/signe', name: 'app_admin_signe')]
class SigneController extends AbstractController
{
    const MESSAGE = "Le signe";

    #[Route('/ajouter', name: '_ajouter')]
    #[Route('/modifier/{id}', name: '_modifier')]
    public function index(): Response
    {
        return $this->render('competenceCombat/signe/editerSigne.html.twig');
    }
}
