<?php

namespace App\Form;

use App\Entity\Stuff\Arme;
use App\Entity\Stuff\Taille;
use App\Entity\Stuff\TypeArme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArmeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => "Nom*",
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'validationCustom03',
                    'required' => true,
                ],
            ])
            ->add('degat', TextType::class, [
                'label' => "Dégâts",
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'validationCustom03',
                ],
            ])
            ->add('mains', TextType::class, [
                'label' => "Mains",
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'validationCustom03',
                ],
            ])
            ->add('portee', TextType::class, [
                'label' => "Portée",
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'validationCustom03',
                ],
            ])
            ->add('effet', TextType::class, [
                'label' => "Effet(s)* :",
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'validationCustom03',
                    'required' => true,
                ],
            ])
            ->add('poids', TextType::class, [
                'label' => "Poids*",
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'validationCustom03',
                    'required' => true,
                ],
            ])
            ->add('prix', TextType::class, [
                'label' => "Prix*",
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'validationCustom03',
                    'required' => true,
                ],
            ])
            ->add('taille', EntityType::class, [
                'class' => Taille::class,
                'choice_label' => 'libelle',
                'label' => "Taille*",
                'required' => true,
                'attr' => [
                    'class' => 'form-select',
                ],
            ])
            ->add('typeArme', EntityType::class, [
                'class' => TypeArme::class,
                'choice_label' => 'libelle',
                'label' => "Type d'arme*",
                'required' => true,
                'attr' => [
                    'class' => 'form-select',
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
