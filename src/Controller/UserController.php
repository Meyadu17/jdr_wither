<?php

namespace App\Controller;

use App\Form\RegistrationType;
use App\Repository\UserRepository;
use App\Service\UploadService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/profil', name: 'app_profil')]
class UserController extends AbstractController
{
    #[Route('/', name: '_consulter')]
    public function index(): Response
    {
        return $this->render('user/consult_profil.html.twig');
    }

    #[Route('/modifier', name: '_modifier')]
    public function modifier(Request               $request,
                            EntityManagerInterface $entityManager,
                            UserRepository         $userRepository,
                            UploadService          $uploadService): Response
    {
        // Récupérez l'utilisateur connecté
        $user = $this->getUser();
        $pseudo = $this->getUser()->getPseudo();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // Créez le formulaire de modification
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
//            // Vérifiez si le pseudo a été modifié
//            $newPseudo = $form->get('pseudo')->getData();
//
//            if ($newPseudo !== $pseudo) {
//                // Le pseudo a été modifié, vérifiez s'il est unique
//                $existingUser = $userRepository->findOneBy(['pseudo' => $newPseudo]);
//                if ($existingUser && $existingUser !== $pseudo) {
//                    $form->get('pseudo')->addError(new FormError('Ce pseudo existe déjà.'));
//                }
//            }
            //Upload de la photo
            if($form->get('photo')->getData()) {
                $newFilename = $uploadService->upload($form->get('photo')->getData(),
                    $this->getParameter('photo_directory'));
                $user->setPhoto($newFilename);
            }

            // Enregistrez les modifications dans la base de données
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash(
                'success',
                'L \'utilisateur a été modifié !'
            );

            return $this->redirectToRoute('app_profil_consulter');
        }


        return $this->render('user/update_profil.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }
}
