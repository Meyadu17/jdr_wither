<?php

namespace App\Form;

use App\Entity\Stuff\Arme;
use App\Entity\Stuff\Taille;
use App\Entity\Stuff\TypeArme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArmeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typeArme', EntityType::class, [
                'class' => TypeArme::class,
                'choice_label' => 'libelle',
                'label' => "Type d'arme*",
                'required' => true,
                'placeholder' => 'Choisir le type de l\'arme',
                'attr' => [
                    'class' => 'form-select required-field',
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
            ->add('nom', TextType::class, [
                'label' => "Nom*",
                'attr' => [
                    'class' => 'form-control required-field',
                    'placeholder' => 'Arc court',
                    'required' => true,
                ],
            ])
            ->add('degat', TextType::class, [
                'label' => "Dégâts",
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => '1d6+3',
                ],
            ])
            ->add('mains', IntegerType::class, [
                'label' => "Mains (1, ou 2)",
                'attr' => [
                    'class' => 'form-control positive-integer',
                    'placeholder' => 'Saisissez un nombre'
                ],
            ])
            ->add('portee', IntegerType::class, [
                'label' => "Portée (en mettre)",
                'attr' => [
                    'class' => 'form-control positive-integer',
                    'placeholder' => 'Saisissez un nombre'
                ],
            ])
            ->add('effet', TextType::class, [
                'label' => "Effet(s)",
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'saignement',
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Arme::class,
        ]);
    }
}
