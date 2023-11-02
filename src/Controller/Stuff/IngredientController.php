<?php

namespace App\Controller\Stuff;

use App\Entity\Stuff\Ingredient;
use App\Form\IngredientType;
use App\Repository\Stuff\IngredientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ingredient', name: 'app_admin_ingredient')]
class IngredientController extends AbstractController
{
    const MESSAGE = "L'ingrédient d'alchimie";
    #[Route('/ajouter', name: '_ajouter')]
    #[Route('/modifier/{id}', name: '_modifier')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager,
                          IngredientRepository $ingredientRepository,
                          int $id = null): Response
    {
        //Vérifier si c'est une création ou une modification
        if($id == null){
            $ingredient = new Ingredient();
        }else{
            $ingredient = $ingredientRepository->find($id);
        }
        $form = $this->createForm(IngredientType::class, $ingredient);
        $form->handleRequest($request);
        //Si le formulaire est valide

        if($form->isSubmitted() && $form->isValid()) {
                //traitement des données
                $entityManager->persist($ingredient);
                $entityManager->flush();

                //message de succés
                $this->addFlash(
                    'success',
                    self::MESSAGE . ' à bien été édité !'
                );

                if ($request->request->has('create_and_new')) {
                    // Redirige vers le formulaire avec un nouvel objet Arme
                    return $this->redirectToRoute('app_admin_ingredient_ajouter');
                } else {
                    return $this->redirectToRoute('app_stuff_ingredient');
                }

            }
        return $this->render('stuff/ingredient/editerIngredient.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
