<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Repository\UserRepository;
use App\Service\UploadService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class LoginController extends AbstractController
{
    //#region déclaration variable email
    /*
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }
    */
    //#endregion déclaration variable email
    #[Route('/connexion', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils, Security $security): Response
    {
        if ($security->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_accueil'); // Redirigez l'utilisateur connecté vers la page d'accueil
        }
        // Obtenez l'erreur de connexion s'il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();

        // Dernier nom d'utilisateur saisi par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    #[Route('/inscription', name: 'app_register')]
    public function register(Request $request,
                             UserPasswordHasherInterface $userPasswordHasher,
                             EntityManagerInterface      $entityManager,
                             UserRepository              $userRepository,
                             UploadService               $uploadService,
                             Security                    $security): Response
    {
        if ($security->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_accueil'); // Redirigez l'utilisateur connecté vers la page d'accueil
        }

        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            // On récupère le Pseudo et l'Email
            $newPseudo = $form->get('pseudo')->getData();
            $newEmail = $form->get('email')->getData();

            // Vérifier si le Pseudo et l'email sont uniques
            $existingUser = $userRepository->findOneBy(['pseudo' => $newPseudo]);
            $existingEmail = $userRepository->findOneBy(['email' => $newEmail]);

            if ($existingUser && $existingUser !== $user) {
                //Si le pseudo existe déjà, on arrête le traitement et on affiche un message flash
                $form->get('pseudo')->addError(new FormError('Ce pseudo existe déjà.'));
                $this->addFlash('error',
                    'Le pseudo existe déjà');
            } elseif ($existingEmail && $existingEmail !== $user) {
                //Si l'email existe déjà, on arrête le traitement et on affiche un message flash
                $form->get('email')->addError(new FormError('Il existe déjà un compte avec cette email.'));
                $this->addFlash('error',
                    'Il existe déjà un compte avec cette email.');
            } else {
                //Si le pseudo et l'email n'existent pas, on poursuit le traitement
                //#region Mot de passe
                // Hash du mot de passe
                $user->setPassword(
                    $userPasswordHasher->hashPassword(
                        $user,
                        $form->get('password')->getData()
                    )
                );
                //#endregion Mot de passse

                //#region Photo
                //Upload de la photo
                if($form->get('photo')->getData()) {
                    $newFilename = $uploadService->upload($form->get('photo')->getData(),
                        $this->getParameter('photo_directory'));
                    $user->setPhoto($newFilename);
                }
                //#endregion Photo

                $entityManager->persist($user);
                $entityManager->flush();

                return $this->redirectToRoute('home');
            }

            //#region email
            /*
            // Générez une URL signée et envoyez-la par e-mail à l'utilisateur
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('mailer@you-demaoin.com', 'Meya'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );
            // faites tout ce dont vous avez besoin ici, comme envoyer un e-mail
            */
            //#endregion email

        }

        return $this->render('login/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    //#region verifier email
    /*
    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        // @TODO Modifiez la redirection en cas de succès et gérez ou supprimez le message flash dans vos modèles
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_register');
    }
    */
    //#endregion verifier email

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): never
    {
        // Le contrôleur peut être vide : il ne sera jamais appelé !
        throw new \Exception('N\'oubliez pas d\'activer la déconnexion dans security.yaml');
    }
}
