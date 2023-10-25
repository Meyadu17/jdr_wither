<?php

namespace App\Controller\Stuff;

use App\Entity\Stuff\Arme;
use App\Form\ArmeType;
use App\Repository\Stuff\ArmeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/arme', name: 'app_admin_arme')]
class ArmeController extends AbstractController
{
    const MESSAGE = "L'arme";

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
        //Si le formulaire est valide

        if($form->isSubmitted() && $form->isValid()) {
            if (is_numeric($arme->getPoids())) {
                //traitement des données
                $entityManager->persist($arme);
                $entityManager->flush();

                //message de succés
                $this->addFlash(
                    'success',
                    self::MESSAGE . ' à bien été édité !'
                );

                return $this->redirectToRoute('app_stuff_arme');

            } /*else {
                $this->addFlash('error',
                    'Le début de la sortie doit être avant la date de fin de sortie'
                );
            }*/



        }

        return $this->render('stuff/arme/editerArme.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
