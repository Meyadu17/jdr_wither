<?php

namespace App\Controller;

use App\Form\UserPasswordType;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Service\UploadService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use function PHPUnit\Framework\isEmpty;

#[Route('/profil', name: 'app_profil')]
class UserController extends AbstractController
{
    #[Route('/', name: '_consulter')]
    public function index(): Response
    {
        return $this->render('user/consult_profil.html.twig');
    }

    #[Route('/modifier', name: '_modifier')]
    public function modifier(Request $request,
                             UserPasswordHasherInterface $userPasswordHasher,
                             EntityManagerInterface $entityManager,
                             UserRepository $userRepository,
                             UploadService $uploadService): Response
    {
        $user = $this->getUser();
        $pseudo = $this->getUser()->getPseudo();
        $email = $this->getUser()->getEmail();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // Créez le formulaire de modification
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Vérifiez si le pseudo a été modifié
            $newPseudo = $form->get('pseudo')->getData();
            $newEmail = $form->get('email')->getData();

            if ($newPseudo !== $pseudo) {
                // Le pseudo a été modifié, vérifiez s'il est unique
                $existingUser = $userRepository->findOneBy(['pseudo' => $newPseudo]);
                if ($existingUser && $existingUser !== $user) {
                    $form->get('pseudo')->addError(new FormError('Ce pseudo existe déjà.'));
                }
            } elseif ($newEmail !== $email) {
                // L'email a été modifié, vérifiez s'il est unique
                $existingEmail = $userRepository->findOneBy(['email' => $newEmail]);
                if ($existingEmail && $existingEmail !== $user) {
                    $form->get('email')->addError(new FormError('Cet e-mail existe déjà.'));
                }
            }

            // Upload de la photo
            if ($form->get('photo')->getData()) {
                $newFilename = $uploadService->upload($form->get('photo')->getData(), $this->getParameter('photo_directory'));
                $user->setPhoto($newFilename);
            }

            // Enregistrez les modifications dans la base de données
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', "L'utilisateur a été modifié !");

            return $this->redirectToRoute('app_profil_consulter');
        }

        return $this->render('user/update_profil.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }

    #[Route('/modifier/pw', name: '_modifier_pw')]
    public function updatePassword(Request $request,
                                   EntityManagerInterface $entityManager,
                                   UserPasswordHasherInterface $userPasswordHasher): Response
    {
        // Récupérez l'utilisateur connecté
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // Créez le formulaire de modification
        $form = $this->createForm(UserPasswordType::class, $user);
        $form->handleRequest($request);

        // Récupérez le mot de passe actuel saisi dans le formulaire
        if ($form->isSubmitted() && $form->isValid()) {
            // Récuperez le mot de passe saisie
            $currentPassword = $form->get('currentPassword')->getData();

                if ($userPasswordHasher->isPasswordValid($user, $currentPassword)) {
                    $newPassword = $form->get('password')->get('first')->getData();
                    // Hash du nouveau mot de passe
                    $hashedPassword = $userPasswordHasher->hashPassword($user, $newPassword);
                    $user->setPassword($hashedPassword);

                    // persistance des données
                    $entityManager->persist($user);
                    $entityManager->flush();

                    $this->addFlash('success', 'L\'utilisateur a été modifié !');

                    // Redirigez l'utilisateur vers la paged'accueil
                    return $this->redirectToRoute('app_profil_consulter');
                }
        }

        return $this->render('user/update_password.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }
}
