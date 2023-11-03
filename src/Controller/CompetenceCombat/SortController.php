<?php

namespace App\Controller\CompetenceCombat;

use App\Entity\CompetenceCombat\Sort;
use App\Form\SortType;
use App\Repository\CompetenceCombat\SortRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/sort', name: 'app_admin_sort')]
class SortController extends AbstractController
{
    const MESSAGE = "Le sort";

    #[Route('/ajouter', name: '_ajouter')]
    #[Route('/modifier/{id}', name: '_modifier')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager,
                          SortRepository $sortRepository,
                          int $id = null): Response
    {
        //Vérifier si c'est une création ou une modification
        if($id == null){
            $sort = new Sort();
        }else{
            $sort = $sortRepository->find($id);
        }

        $form = $this->createForm(SortType::class, $sort);
        $form->handleRequest($request);

        //Si le formulaire est valide
        if($form->isSubmitted() && $form->isValid()) {
            //traitement des données
            $entityManager->persist($sort);
            $flush = $entityManager->flush();

            //message de succés
            $this->addFlash(
                'success',
                self::MESSAGE . ' à bien été édité !'
            );

            if ($request->request->has('create_and_new')) {
                // Redirige vers le formulaire avec un nouvel objet Arme
                return $this->redirectToRoute('app_admin_sort_ajouter');
            } else {
                return $this->redirectToRoute('app_competence_combat_sort');
            }
        }

        return $this->render('competenceCombat/sort/editerSort.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
