<?php

namespace App\Controller\GuidePerso;

use App\Repository\RaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/guide/personnage', name: 'app_guide_personnage')]
class GuidePersonnageController extends AbstractController
{
    #[Route('/', name: '_lister')]
    public function index(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('guidePersonnage/guidePersonnage.html.twig');
    }

    #[Route('/talents', name: '_talents')]
    public function talents(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('guidePersonnage/talent/listerTalent.html.twig');
    }

    #[Route('/epreuves', name: '_handicaps')]
    public function handicaps(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('guidePersonnage/epreuves/listerEpreuves.html.twig');
    }

    #[Route('/jobs', name: '_jobs')]
    public function jobs(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('guidePersonnage/job/listerJob.html.twig');
    }

    #[Route('/races', name: '_races')]
    public function races(RaceRepository $raceRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('guidePersonnage/race/listerRace.html.twig',[
            'races' => $raceRepository->findAll()
        ]);
    }
}
