<?php

namespace App\Form;

use App\Entity\Stuff\EquipementGeneral;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipementGeneralType extends AbstractType
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
            'data_class' => EquipementGeneral::class,
        ]);
    }
}
