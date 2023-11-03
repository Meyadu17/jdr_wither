<?php

namespace App\Form;

use App\Entity\CompetenceCombat\Element;
use App\Entity\CompetenceCombat\NiveauSigne;
use App\Entity\CompetenceCombat\Signe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SigneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('niveauSigne', EntityType::class, [
                'class' => NiveauSigne::class,
                'choice_label' => 'libelle',
                'label' => "Niveau*",
                'required' => true,
                'placeholder' => 'Choisir le niveau du signe',
                'attr' => [
                    'class' => 'form-select required-field',
                ],
            ])
            ->add('element', EntityType::class, [
                'class' => Element::class,
                'choice_label' => 'libelle',
                'label' => "Element*",
                'required' => true,
                'placeholder' => 'Choisir le type de d\'élément',
                'attr' => [
                    'class' => 'form-select required-field',
                ],
            ])
            ->add('nom', TextType::class, [
                'label' => "Nom*",
                'attr' => [
                    'class' => 'form-control required-field',
                    'placeholder' => 'ex : gants en cuirs',
                    'required' => true,
                ],
            ])
            ->add('portee', TextType::class, [
                'label' => "Portée*",
                'attr' => [
                    'class' => 'form-control required-field',
                    'placeholder' => 'ex : Corps x 2m',
                    'required' => true,
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => "Description*",
                'attr' => [
                    'class' => 'form-control required-field',
                    'placeholder' => 'Description de l\'armure, du bouclier...',
                    'required' => true,
                ],
            ])
            ->add('cout', TextType::class, [
                'label' => "Cout d'endurance*",
                'attr' => [
                    'class' => 'form-control required-field',
                    'placeholder' => 'ex : variable',
                    'required' => true,
                ],
            ])
            ->add('duree', TextType::class, [
                'label' => "Durée",
                'attr' => [
                    'class' => 'form-control required-field',
                    'placeholder' => 'ex : Corps x 2m',
                    'required' => true,
                ],
            ])
            ->add('contre', TextType::class, [
                'label' => "Contre",
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'ex : Corps x 2m',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Signe::class,
        ]);
    }
}
