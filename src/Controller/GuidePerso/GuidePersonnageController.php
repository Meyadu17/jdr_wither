<?php

namespace App\Controller\GuidePerso;

use App\Repository\GuideCompetence\HandicapMoralRepository;
use App\Repository\GuideCompetence\HandicapPhysiqueRepository;
use App\Repository\GuideCompetence\JobRepository;
use App\Repository\GuideCompetence\QueteRepository;
use App\Repository\GuideCompetence\RaceRepository;
use App\Repository\GuideCompetence\TalentRepository;
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
    public function talents( TalentRepository $talentRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('guidePersonnage/talent/listerTalent.html.twig',[
            'talents' => $talentRepository->findAll()
        ]);
    }

    #[Route('/epreuves', name: '_handicaps')]
    public function handicaps(HandicapMoralRepository $handicapMoralRepository,
                              HandicapPhysiqueRepository $handicapPhysiqueRepository,
                              QueteRepository $queteRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('guidePersonnage/epreuves/listerEpreuves.html.twig',[
            'handicapsMoraux' => $handicapMoralRepository->findAll(),
            'handicapsPhysiques' => $handicapPhysiqueRepository->findAll(),
            'quetes' => $queteRepository->findAll()
        ]);
    }

    #[Route('/jobs', name: '_jobs')]
    public function jobs(JobRepository $jobRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('guidePersonnage/job/listerJob.html.twig',[
            'jobs' => $jobRepository->findAll()
        ]);
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
