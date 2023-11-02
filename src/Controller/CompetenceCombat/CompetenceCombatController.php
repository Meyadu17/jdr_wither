<?php

namespace App\Controller\CompetenceCombat;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/competence/combat', name: 'app_competence_combat')]
class CompetenceCombatController extends AbstractController
{
    #[Route('/', name: '_lister')]
    public function index(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('competenceCombat/competenceCombat.html.twig');
    }

    #[Route('/dons', name: '_don')]
    public function dons(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('competenceCombat/don/listerDon.html.twig');
    }

    #[Route('/signes', name: '_signe')]
    public function signes(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('competenceCombat/signe/listerSigne.html.twig');
    }

    #[Route('/sorts', name: '_sort')]
    public function sorts(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('competenceCombat/sort/listerSort.html.twig');
    }

}
