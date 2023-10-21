<?php

namespace App\Controller\Stuff;

use App\Repository\Stuff\ArmeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/arme', name: 'app_admin_arme')]
class ArmeController extends AbstractController
{
    #[Route('/', name: '_lister')]
    public function lister(ArmeRepository $armeRepository): Response
    {
        return $this->render('stuff/arme/listerArme.html.twig', [
            'armes' => $armeRepository->findAll(),
        ]);
    }
}
