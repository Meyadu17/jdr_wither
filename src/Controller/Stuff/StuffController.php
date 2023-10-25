<?php

namespace App\Controller\Stuff;

use App\Repository\Stuff\EquipementGeneralRepository;
use App\Repository\Stuff\IngredientRepository;
use App\Repository\Stuff\OutilRepository;
use App\Repository\Stuff\TypeArmeRepository;
use App\Repository\Stuff\TypeArmureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/stuff', name: 'app_stuff')]
class StuffController extends AbstractController
{
    #[Route('/', name: '_lister')]
    public function magasin(): Response
    {
        return $this->render('stuff/magasin.html.twig');
    }

    #[Route('/armes', name: '_arme')]
    public function armes(TypeArmeRepository $typeRepository): Response
    {
        return $this->render('stuff/arme/listerArme.html.twig', [
            'typeArmes' =>$typeRepository->findAll(),
        ]);
    }

    #[Route('/armures', name: '_armure')]
    public function armures(TypeArmureRepository $typeArmureRepository): Response
    {
        return $this->render('stuff/armure/listerArmure.html.twig', [
            'typeArmures' =>$typeArmureRepository->findAll(),
        ]);
    }

    #[Route('/equipement/general', name: '_equipement')]
    public function equipementGeneral(EquipementGeneralRepository $equipementGeneralRepository): Response
    {
        return $this->render('stuff/equipement_general/listerEquipementG.html.twig', [
            'equipements' =>$equipementGeneralRepository->findAll(),
        ]);
    }

    #[Route('/ingredients', name: '_ingredient')]
    public function alchimie(IngredientRepository $ingredientRepository): Response
    {
        return $this->render('stuff/ingredient/listerIngredient.html.twig', [
            'ingredients' =>$ingredientRepository->findAll(),
        ]);
    }

    #[Route('/outils', name: '_outil')]
    public function outil(OutilRepository $outilRepository): Response
    {
        //TODO - Outils
        return $this->render('stuff/outil/listerOutil.html.twig', [
            'outils' =>$outilRepository->findAll(),
        ]);
    }
}
