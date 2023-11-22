<?php

namespace App\Controller\GuidePerso;

use App\Entity\Job;
use App\Form\JobType;
use App\Repository\JobRepository;
use App\Service\UploadService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/admin/job', name: 'app_admin_job')]
class JobController extends AbstractController
{
    const MESSAGE = "Le job";

    #[Route('/ajouter', name: '_ajouter')]
    #[Route('/modifier/{id}', name: '_modifier')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager,
                          JobRepository $jobRepository,
                          UploadService $uploadService,
                          int $id = null): Response
    {
        //Vérifier si c'est une création ou une modification
        if($id == null){
            $job = new Job();
        }else{
            $job = $jobRepository->find($id);
        }

        $form = $this->createForm(JobType::class, $job);
        $form->handleRequest($request);

        //Si le formulaire est valide
        if($form->isSubmitted() && $form->isValid()) {

            // Le formulaire est valide, vous pouvez accéder aux données
            // Définir les bonus dans l'objet Job
            $job->setBonusCaracteristiques($form->get('bonusCaracteristiques')->getData());
            $job->setBonusTalent($form->get('bonusTalent')->getData());

            // Upload de la photo
            if ($form->get('photo')->getData()) {
                $newFilename = $uploadService->upload($form->get('photo')->getData(),
                                                      $this->getParameter('photo_directory'));
                $job->setPhoto($newFilename);
            }

            //traitement des données
            $entityManager->persist($job);
            $entityManager->flush();

            //message de succés
            $this->addFlash(
                'success',
                self::MESSAGE . ' à bien été édité !'
            );

            if ($request->request->has('create_and_new')) {
                // Redirige vers le formulaire avec un nouvel objet Arme
                return $this->redirectToRoute('app_admin_job_ajouter');
            } else {
                return $this->redirectToRoute('app_guide_personnage_jobs');
            }
        }


        return $this->render('guidePersonnage/job/editerJob.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}