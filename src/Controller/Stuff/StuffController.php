<?php

namespace App\Controller\Stuff;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/stuff', name: 'app_stuff')]
class StuffController extends AbstractController
{
    #[Route('/', name: '_lister')]
    public function lister(): Response
    {
        return $this->render('stuff/magasin.html.twig', [
            'controller_name' => 'ArmeController',
        ]);
    }
}
