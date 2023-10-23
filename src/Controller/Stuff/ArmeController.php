<?php

namespace App\Controller\Stuff;

use App\Entity\Stuff\Arme;
use App\Form\ArmeType;
use App\Repository\Stuff\ArmeRepository;
use App\Repository\Stuff\TypeArmeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/arme', name: 'app_admin_arme')]
class ArmeController extends AbstractController
{
    const MESSAGE = "L'arme'";
//    #[Route('/', name: '_lister')]
//    public function lister(TypeArmeRepository $typeRepository): Response
//    {
//
//        return $this->render('stuff/arme/listerArme.html.twig', [
//            'typeArmes' =>$typeRepository->findAll(),
//        ]);
//    }

    #[Route('/ajouter', name: '_ajouter')]
    #[Route('/modifier/{id}', name: '_modifier')]
    public function editier(Request                 $request,
                            EntityManagerInterface  $entityManager,
                            ArmeRepository          $armeRepository,
                            int                     $id = null): Response
    {
        //Vérifier si c'est une création ou une modification
        if($id == null){
            $arme = new Arme();
        }else{
            $arme = $armeRepository->find($id);
        }

        $form = $this->createForm(ArmeType::class, $arme);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            //traitement des données
            $entityManager->persist($arme);
            $entityManager->flush();

            //message de succés
            $this->addFlash(
                'success',
                self::MESSAGE . ' à bien été édité !'
            );

            return $this->redirectToRoute('app_admin_arme_lister');
        }

        return $this->render('stuff/arme/editerArme.html.twig', [
            'form' => $form,
        ]);
    }
}
