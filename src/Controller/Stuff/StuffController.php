<?php

namespace App\Controller\Stuff;

use App\Form\Search\SearchArmeType;
use App\Form\Search\SearchArmureType;
use App\Form\Search\SearchEquipementGeneralType;
use App\Form\Search\SearchIngredientType;
use App\Form\Search\SearchOutilType;
use App\Repository\Stuff\ArmeRepository;
use App\Repository\Stuff\ArmureRepository;
use App\Repository\Stuff\EquipementGeneralRepository;
use App\Repository\Stuff\IngredientRepository;
use App\Repository\Stuff\OutilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/stuff', name: 'app_stuff')]
class StuffController extends AbstractController
{
    #[Route('/', name: '_lister')]
    public function magasin(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        return $this->render('stuff/magasin.html.twig');
    }

    #[Route('/armes', name: '_arme')]
    public function armes(Request            $request,
                          ArmeRepository     $armeRepository
                          ): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(SearchArmeType::class);
        $form->handleRequest($request);

        $nom = $form->get('nom')->getData();

        if ($nom) {
            $armesGroupedByType = $armeRepository->findArmesFilteredByNom($nom);
        } else {
            $armesGroupedByType = $armeRepository->findArmesGroupedByType();
        }
        if ($request->isXmlHttpRequest()) {
            // Si la requête est une requête AJAX

            return $this->json($armesGroupedByType);
        }

        // Si ce n'est pas une requête AJAX, affichez la page normalement
        return $this->render('stuff/arme/listerArme.html.twig', [
            'armesGroupedByType' => $armesGroupedByType,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/armures', name: '_armure')]
    public function armures(Request            $request,
                            ArmureRepository   $armureRepository,
                            ): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(SearchArmureType::class);
        $form->handleRequest($request);

        $nom = $form->get('nom')->getData();

        if ($nom) {
            $armuresGroupedByType = $armureRepository->findArmuresFilteredByNom($nom);
        } else {
            $armuresGroupedByType = $armureRepository->findArmuresGroupedByType();
        }
        if ($request->isXmlHttpRequest()) {
            // Si la requête est une requête AJAX

            return $this->json($armuresGroupedByType);
        }

        // Si ce n'est pas une requête AJAX, affichez la page normalement
        return $this->render('stuff/armure/listerArmure.html.twig', [
            'armuresGroupedByType' => $armuresGroupedByType,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/equipement/general', name: '_equipement')]
    public function equipementGeneral(Request $request,
                                      EquipementGeneralRepository $equipementRepository
                                      ): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(SearchEquipementGeneralType::class);
        $form->handleRequest($request);

        $nom = $form->get('nom')->getData();

        if ($nom) {
            $equipementGroupedByType = $equipementRepository->findEquipementsFilteredByNom($nom);
        } else {
            $equipementGroupedByType = $equipementRepository->findEquipementsGroupedByType();
        }
        if ($request->isXmlHttpRequest()) {
            // Si la requête est une requête AJAX

            return $this->json($equipementGroupedByType);
        }

        return $this->render('stuff/equipement_general/listerEquipementG.html.twig', [
            'equipementGroupedByType' => $equipementGroupedByType,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/ingredients', name: '_ingredient')]
    public function alchimie(Request $request,
                             IngredientRepository $ingredientRepository
                             ): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(SearchIngredientType::class);
        $form->handleRequest($request);

        $nom = $form->get('nom')->getData();

        if ($nom) {
            $ingredients = $ingredientRepository->findIngredientFilteredByNom($nom);
        } else {
            $ingredients = $ingredientRepository->findIngredientByName();
        }
        if ($request->isXmlHttpRequest()) {
            // Si la requête est une requête AJAX

            return $this->json($ingredients);
        }

        return $this->render('stuff/ingredient/listerIngredient.html.twig', [
            'ingredients' => $ingredients,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/outils', name: '_outil')]
    public function outil(Request $request,
                          OutilRepository $outilRepository
                          ): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(SearchOutilType::class);
        $form->handleRequest($request);

        $nom = $form->get('nom')->getData();

        if ($nom) {
            $outils = $outilRepository->findOutilsFilteredByNom($nom);
        } else {
            $outils = $outilRepository->findOutilsByName();
        }
        if ($request->isXmlHttpRequest()) {
            // Si la requête est une requête AJAX

            return $this->json($outils);
        }
        return $this->render('stuff/outil/listerOutil.html.twig', [
            'outils' => $outils,
            'form' => $form->createView(),
        ]);
    }
}
