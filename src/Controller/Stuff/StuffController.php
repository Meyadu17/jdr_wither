<?php

namespace App\Controller\Stuff;

use App\Form\SearchTypeArmeType;
use App\Repository\Stuff\ArmeRepository;
use App\Repository\Stuff\EquipementGeneralRepository;
use App\Repository\Stuff\IngredientRepository;
use App\Repository\Stuff\OutilRepository;
use App\Repository\Stuff\EmplacementArmureRepository;
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
        $form = $this->createForm(SearchTypeArmeType::class);
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
    public function armures(EmplacementArmureRepository $typeArmureRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        //TODO - Armures
        return $this->render('stuff/armure/listerArmure.html.twig', [
            'typeArmures' =>$typeArmureRepository->findAll(),
        ]);
    }

    #[Route('/equipement/general', name: '_equipement')]
    public function equipementGeneral(EquipementGeneralRepository $equipementGeneralRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        //TODO - Equipements
        return $this->render('stuff/equipement_general/listerEquipementG.html.twig', [
            'equipements' =>$equipementGeneralRepository->findAll(),
        ]);
    }

    #[Route('/ingredients', name: '_ingredient')]
    public function alchimie(IngredientRepository $ingredientRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        //TODO - Ingredients
        return $this->render('stuff/ingredient/listerIngredient.html.twig', [
            'ingredients' =>$ingredientRepository->findAll(),
        ]);
    }

    #[Route('/outils', name: '_outil')]
    public function outil(OutilRepository $outilRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        //TODO - Outils
        return $this->render('stuff/outil/listerOutil.html.twig', [
            'outils' =>$outilRepository->findAll(),
        ]);
    }
}
