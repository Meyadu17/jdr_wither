<?php

namespace App\Controller\GuidePerso;

use App\Entity\Race;
use App\Form\RaceType;
use App\Repository\RaceRepository;
use App\Service\UploadService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/admin/race', name: 'app_admin_race')]
class RaceController extends AbstractController
{
    const MESSAGE = "La race";

    #[Route('/ajouter', name: '_ajouter')]
    #[Route('/modifier/{id}', name: '_modifier')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager,
                          RaceRepository $raceRepository,
                          UploadService $uploadService,
                          int $id = null): Response
    {
        //Vérifier si c'est une création ou une modification
        if($id == null){
            $race = new Race();
        }else{
            $race = $raceRepository->find($id);
        }

        $form = $this->createForm(RaceType::class, $race);
        $form->handleRequest($request);

        //Si le formulaire est valide
        if($form->isSubmitted() && $form->isValid()) {

            // Upload de la photo
            if ($form->get('photo')->getData()) {
                $newFilename = $uploadService->upload($form->get('photo')->getData(), $this->getParameter('photo_directory'));
                $race->setPhoto($newFilename);
            }

            //traitement des données
            $entityManager->persist($race);
            $entityManager->flush();

            //message de succés
            $this->addFlash(
                'success',
                self::MESSAGE . ' à bien été édité !'
            );

            if ($request->request->has('create_and_new')) {
                // Redirige vers le formulaire avec un nouvel objet Arme
                return $this->redirectToRoute('app_admin_race_ajouter');
            } else {
                return $this->redirectToRoute('app_guide_personnage_races');
            }
        }

        return $this->render('guidePersonnage/race/editerRace.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
