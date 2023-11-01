<?php

namespace App\Controller\Stuff;

use App\Entity\Stuff\EquipementGeneral;
use App\Form\EquipementGeneralType;
use App\Repository\Stuff\EquipementGeneralRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/equipement', name: 'app_admin_equipement')]
class EquipementGeneralController extends AbstractController
{
    const MESSAGE = "L'équipement";
    #[Route('/ajouter', name: '_ajouter')]
    #[Route('/modifier/{id}', name: '_modifier')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager,
                          EquipementGeneralRepository $equipementGeneralRepository,
                          int $id = null): Response
    {
        //Vérifier si c'est une création ou une modification
        if($id == null){
            $equipement = new EquipementGeneral();
        }else{
            $equipement = $equipementGeneralRepository->find($id);
        }

        $form = $this->createForm(EquipementGeneralType::class, $equipement);
        $form->handleRequest($request);
        //Si le formulaire est valide

        if($form->isSubmitted() && $form->isValid()) {
            if (is_numeric($equipement->getPoids())) {
                //traitement des données
                $entityManager->persist($equipement);
                $entityManager->flush();

                //message de succés
                $this->addFlash(
                    'success',
                    self::MESSAGE . ' à bien été édité !'
                );

                if ($request->request->has('create_and_new')) {
                    // Redirige vers le formulaire avec un nouvel objet Arme
                    return $this->redirectToRoute('app_admin_equipement_ajouter');
                } else {
                    return $this->redirectToRoute('app_stuff_equipement');
                }

            }
        }
        return $this->render('stuff/equipement_general/editerEquipementG.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
