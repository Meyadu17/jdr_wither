<?php

namespace App\Form;

use App\Entity\Stuff\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IngredientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => "Nom*",
                'attr' => [
                    'class' => 'form-control required-field',
                    'placeholder' => 'ex : gants en cuirs',
                    'required' => true,
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => "Desctiption",
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'description de l\'ingrédient...',
                ],
            ])
            ->add('effet', TextareaType::class, [
                'label' => "Effet(s)",
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'ex : Saignement',
                ],
            ])
            ->add('prix', IntegerType::class, [
                'label' => "Prix*",
                'attr' => [
                    'class' => 'form-control required-field positive-integer',
                    'placeholder' => 'Saisissez un nombre',
                    'required' => true,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ingredient::class,
        ]);
    }
}
