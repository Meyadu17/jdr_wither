<?php

namespace App\Form;

use App\Entity\Stuff\Armure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArmureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => "Nom*",
                'attr' => [
                    'class' => 'form-control',
                    'required' => true,
                ],
            ])
            ->add('protection', TextType::class, [
                'label' => "Protection*",
                'attr' => [
                    'class' => 'form-control',
                    'required' => true,
                ],
            ])
            ->add('effet', TextType::class, [
                'label' => "Effet*",
                'attr' => [
                    'class' => 'form-control',
                    'required' => true,
                ],
            ])
            ->add('encombrement', TextType::class, [
                'label' => "Encombrement*",
                'attr' => [
                    'class' => 'form-control',
                    'required' => true,
                ],
            ])
            ->add('poids', TextType::class, [
                'label' => "Poids*",
                'attr' => [
                    'class' => 'form-control',
                    'required' => true,
                ],
            ])
            ->add('prix', TextType::class, [
                'label' => "Prix*",
                'attr' => [
                    'class' => 'form-control',
                    'required' => true,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Armure::class,
        ]);
    }
}
