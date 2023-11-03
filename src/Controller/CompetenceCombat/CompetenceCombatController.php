<?php

namespace App\Controller\CompetenceCombat;

use App\Form\Search\SearchDonType;
use App\Form\Search\SearchSigneType;
use App\Form\Search\SearchSortType;
use App\Repository\CompetenceCombat\DonRepository;
use App\Repository\CompetenceCombat\SigneRepository;
use App\Repository\CompetenceCombat\SortRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function dons(Request $request,
                         DonRepository $donRepository
                         ): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(SearchDonType::class);
        $form->handleRequest($request);

        $nom = $form->get('nom')->getData();

        if ($nom) {
            $dons = $donRepository->findDonsFilteredByNom($nom);
        } else {
            $dons = $donRepository->findDonsByName();
        }
        if ($request->isXmlHttpRequest()) {
            // Si la requête est une requête AJAX

            return $this->json($dons);
        }

        return $this->render('competenceCombat/don/listerDon.html.twig', [
            'dons' => $dons,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/signes', name: '_signe')]
    public function signes(Request $request,
                           SigneRepository $signeRepository
                           ): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(SearchSigneType::class);
        $form->handleRequest($request);

        $nom = $form->get('nom')->getData();

        if ($nom) {
            $signesGroupedByType = $signeRepository->findSignesFilteredByNom($nom);
        } else {
            $signesGroupedByType = $signeRepository->findSignesGroupedByType();
        }
        if ($request->isXmlHttpRequest()) {
            // Si la requête est une requête AJAX
            return $this->json($signesGroupedByType);
        }

        // Si ce n'est pas une requête AJAX, affichez la page normalement
        return $this->render('competenceCombat/signe/listerSigne.html.twig', [
            'signesGroupedByType' => $signesGroupedByType,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/sorts', name: '_sort')]
    public function sorts(Request $request,
                          SortRepository $sortRepository
    ): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(SearchSortType::class);
        $form->handleRequest($request);

        $nom = $form->get('nom')->getData();

        if ($nom) {
            $sortsGroupedByType = $sortRepository->findSortsFilteredByNom($nom);
        } else {
            $sortsGroupedByType = $sortRepository->findSortsGroupedByType();
        }
        if ($request->isXmlHttpRequest()) {
            // Si la requête est une requête AJAX
            return $this->json($sortsGroupedByType);
        }

        // Si ce n'est pas une requête AJAX, affichez la page normalement
        return $this->render('competenceCombat/sort/listerSort.html.twig', [
            'sortsGroupedByType' => $sortsGroupedByType,
            'form' => $form->createView(),
        ]);
    }

}
