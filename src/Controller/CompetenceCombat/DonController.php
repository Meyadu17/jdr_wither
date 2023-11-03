<?php

namespace App\Controller\CompetenceCombat;

use App\Entity\CompetenceCombat\Don;
use App\Form\DonType;
use App\Repository\CompetenceCombat\DonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/don', name: 'app_admin_don')]
class DonController extends AbstractController
{
    const MESSAGE = "Le don";

    #[Route('/ajouter', name: '_ajouter')]
    #[Route('/modifier/{id}', name: '_modifier')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager,
                          DonRepository $donRepository,
                          int $id = null): Response
    {
        //Vérifier si c'est une création ou une modification
        if($id == null){
            $don = new Don();
        }else{
            $don = $donRepository->find($id);
        }
        $form = $this->createForm(DonType::class, $don);
        $form->handleRequest($request);

        //Si le formulaire est valide
        if($form->isSubmitted() && $form->isValid()) {
            //traitement des données
            $entityManager->persist($don);
            $entityManager->flush();

            //message de succés
            $this->addFlash(
                'success',
                self::MESSAGE . ' à bien été édité !'
            );

            if ($request->request->has('create_and_new')) {
                // Redirige vers le formulaire avec un nouvel objet Arme
                return $this->redirectToRoute('app_admin_don_ajouter');
            } else {
                return $this->redirectToRoute('app_competence_combat_don');
            }

        }
        return $this->render('competenceCombat/don/editerDon.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
