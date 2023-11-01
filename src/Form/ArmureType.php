<?php

namespace App\Form;

use App\Entity\Stuff\Armure;
use App\Entity\Stuff\EmplacementArmure;
use App\Entity\Stuff\EncombrementArmure;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArmureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('emplacementArmure', EntityType::class, [
                'class' => EmplacementArmure::class,
                'choice_label' => 'libelle',
                'label' => "Emplacement*",
                'required' => true,
                'placeholder' => 'Choisir l\'encombrement',
                'attr' => [
                    'class' => 'form-select required-field',
                ],
            ])
            ->add('encombrementArmure', EntityType::class, [
                'class' => EncombrementArmure::class,
                'choice_label' => 'libelle',
                'label' => "Encombrement*",
                'required' => true,
                'placeholder' => 'Choisir l\'encombrement',
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
            ->add('protection', IntegerType::class, [
                'label' => "Protection (PA)",
                'attr' => [
                    'class' => 'form-control positive-integer',
                    'placeholder' => 'Saisissez un nombre'
                ],
            ])
            ->add('effet', TextType::class, [
                'label' => "Effet(s)",
                'attr' => [
                    'class' => 'form-control',
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Armure::class,
        ]);
    }
}
