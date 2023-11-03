<?php

namespace App\Form;

use App\Entity\CompetenceCombat\Element;
use App\Entity\CompetenceCombat\NiveauSort;
use App\Entity\CompetenceCombat\Sort;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('niveauSort', EntityType::class, [
                'class' => NiveauSort::class,
                'choice_label' => 'libelle',
                'label' => "Niveau*",
                'required' => true,
                'placeholder' => 'Choisir le niveau du sort',
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
            ->add('effet', TextareaType::class, [
                'label' => "Effet*",
                'attr' => [
                    'class' => 'form-control required-field',
                    'placeholder' => 'Description du sort...',
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
                    'placeholder' => '3 tours',
                    'required' => true,
                ],
            ])
            ->add('contre', TextType::class, [
                'label' => "Contre",
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'ex : esquive',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sort::class,
        ]);
    }
}
