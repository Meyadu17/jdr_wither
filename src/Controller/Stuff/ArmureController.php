<?php

namespace App\Controller\Stuff;

use App\Entity\Stuff\Armure;
use App\Form\ArmureType;
use App\Repository\Stuff\ArmureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/armure', name: 'app_admin_armure')]
class ArmureController extends AbstractController
{
    const MESSAGE = "L'armure";
    #[Route('/ajouter', name: '_ajouter')]
    #[Route('/modifier/{id}', name: '_modifier')]
    public function index(Request $request,
                        EntityManagerInterface $entityManager,
                        ArmureRepository $armureRepository,
                        int $id = null): Response
    {
        //Vérifier si c'est une création ou une modification
        if($id == null){
            $armure = new Armure();
        }else{
            $armure = $armureRepository->find($id);
        }

        $form = $this->createForm(ArmureType::class, $armure);
        $form->handleRequest($request);

        //Si le formulaire est valide
        if($form->isSubmitted() && $form->isValid()) {
        //traitement des données
        $entityManager->persist($armure);
        $entityManager->flush();

        //message de succés
        $this->addFlash(
            'success',
            self::MESSAGE . ' à bien été édité !'
        );
            return $this->redirectToRoute('app_admin_armure_lister');
        }

        return $this->render('stuff/armure/editerArmure.html.twig', [
            'form' => $form,
        ]);
    }
}
