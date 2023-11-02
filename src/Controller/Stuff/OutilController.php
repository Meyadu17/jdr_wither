<?php

namespace App\Controller\Stuff;

use App\Entity\Stuff\Outil;
use App\Form\OutilType;
use App\Repository\Stuff\OutilRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/outil', name: 'app_admin_outil')]
class OutilController extends AbstractController
{
    const MESSAGE = "L'outil";
    #[Route('/ajouter', name: '_ajouter')]
    #[Route('/modifier/{id}', name: '_modifier')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager,
                          OutilRepository $outilRepository,
                          int $id = null): Response
    {
        //Vérifier si c'est une création ou une modification
        if($id == null){
            $outil = new Outil();
        }else{
            $outil = $outilRepository->find($id);
        }
        $form = $this->createForm(OutilType::class, $outil);
        $form->handleRequest($request);
        //Si le formulaire est valide

        if($form->isSubmitted() && $form->isValid()) {
            //traitement des données
            $entityManager->persist($outil);
            $entityManager->flush();

            //message de succés
            $this->addFlash(
                'success',
                self::MESSAGE . ' à bien été édité !'
            );

            if ($request->request->has('create_and_new')) {
                // Redirige vers le formulaire avec un nouvel objet Arme
                return $this->redirectToRoute('app_admin_outil_ajouter');
            } else {
                return $this->redirectToRoute('app_stuff_outil');
            }

        }
        return $this->render('stuff/outil/editerOutil.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
