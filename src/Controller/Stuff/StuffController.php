<?php

namespace App\Controller\Stuff;

use App\Repository\Stuff\TypeArmeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/stuff', name: 'app_stuff')]
class StuffController extends AbstractController
{
    #[Route('/', name: '_lister')]
    public function magasin(): Response
    {
        return $this->render('stuff/magasin.html.twig', [
            'controller_name' => 'ArmeController',
        ]);
    }

    #[Route('/armes', name: '_arme')]
    public function armes(TypeArmeRepository $typeRepository): Response
    {
        return $this->render('stuff/arme/listerArme.html.twig', [
            'typeArmes' =>$typeRepository->findAll(),
        ]);
    }

    #[Route('/armures', name: '_armure')]
    public function armures(TypeArmeRepository $typeRepository): Response
    {
    //TODO - Armures
        return $this->render('stuff/armure/listerArmure.html.twig', [
            'typeArmes' =>$typeRepository->findAll(),
        ]);
    }

    #[Route('/equipement/general', name: '_equipement')]
    public function equipementGeneral(TypeArmeRepository $typeRepository): Response
    {
        //TODO - Equipement général
        return $this->render('stuff/equipement_general/listerEquipementG.html.twig', [
            'typeArmures' =>$typeRepository->findAll(),
        ]);
    }

    #[Route('/ingredients', name: '_ingredient')]
    public function alchimie(TypeArmeRepository $typeRepository): Response
    {
        //TODO- Alchimie
        return $this->render('stuff/ingredient/listerIngredient.html.twig', [
            'typeArmures' =>$typeRepository->findAll(),
        ]);
    }

    #[Route('/outils', name: '_outil')]
    public function outil(TypeArmeRepository $typeRepository): Response
    {
        //TODO - Outils
        return $this->render('stuff/outil/listerOutil.html.twig', [
            'typeArmures' =>$typeRepository->findAll(),
        ]);
    }
}
