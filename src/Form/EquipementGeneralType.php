<?php

namespace App\Form;

use App\Entity\Stuff\CategorieFourniture;
use App\Entity\Stuff\EquipementGeneral;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipementGeneralType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('categorieFourniture', EntityType::class, [
                'class' => CategorieFourniture::class,
                'choice_label' => 'libelle',
                'label' => "Type d'équipement*",
                'required' => true,
                'placeholder' => 'Choisir le type d\'équipement',
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
            ->add('description', TextareaType::class, [
                'label' => "Description*",
                'attr' => [
                    'class' => 'form-control required-field',
                    'placeholder' => 'Description de l\'armure, du bouclier...',
                    'required' => true,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EquipementGeneral::class,
        ]);
    }
}
