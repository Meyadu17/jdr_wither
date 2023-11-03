<?php

namespace App\Controller\CompetenceCombat;

use App\Entity\CompetenceCombat\Signe;
use App\Form\SigneType;
use App\Repository\CompetenceCombat\SigneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/signe', name: 'app_admin_signe')]
class SigneController extends AbstractController
{
    const MESSAGE = "Le signe";

    #[Route('/ajouter', name: '_ajouter')]
    #[Route('/modifier/{id}', name: '_modifier')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager,
                          SigneRepository $signeRepository,
                          int $id = null): Response
    {
        //Vérifier si c'est une création ou une modification
        if($id == null){
            $signe = new Signe();
        }else{
            $signe = $signeRepository->find($id);
        }

        $form = $this->createForm(SigneType::class, $signe);
        $form->handleRequest($request);

        //Si le formulaire est valide
        if($form->isSubmitted() && $form->isValid()) {
            //traitement des données
            $entityManager->persist($signe);
            $entityManager->flush();

            //message de succés
            $this->addFlash(
                'success',
                self::MESSAGE . ' à bien été édité !'
            );

            if ($request->request->has('create_and_new')) {
                // Redirige vers le formulaire avec un nouvel objet Arme
                return $this->redirectToRoute('app_admin_signe_ajouter');
            } else {
                return $this->redirectToRoute('app_competence_combat_signe');
            }
        }

        return $this->render('competenceCombat/signe/editerSigne.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
