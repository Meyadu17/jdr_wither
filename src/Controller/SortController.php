<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/sort', name: 'app_admin_sort')]
class SortController extends AbstractController
{
    const MESSAGE = "Le sort";

    #[Route('/ajouter', name: '_ajouter')]
    #[Route('/modifier/{id}', name: '_modifier')]
    public function index(): Response
    {
        return $this->render('competenceCombat/sort/editerSort.html.twig');
    }
}
