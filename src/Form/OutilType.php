<?php

namespace App\Form;

use App\Entity\Stuff\Outil;
use App\Entity\Stuff\Taille;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OutilType extends AbstractType
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
            ->add('effet', TextareaType::class, [
                'label' => "Effet(s)",
                'attr' => [
                    'class' => 'form-control required-field',
                    'placeholder' => 'ex : Saignement',
                ],
            ])
            ->add('poids', NumberType::class, [
                'label' => "Poids*",
                'attr' => [
                    'class' => 'form-control required-field positive-float',
                    'placeholder' => 'Saisissez un nombre',
                    'required' => true,
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
            ->add('taille', EntityType::class, [
                'class' => Taille::class,
                'choice_label' => 'libelle',
                'label' => "Taille de l'arme*",
                'required' => true,
                'placeholder' => 'Choisir la taille', // Message par défaut
                'attr' => [
                    'class' => 'form-select required-field',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Outil::class,
        ]);
    }
}
