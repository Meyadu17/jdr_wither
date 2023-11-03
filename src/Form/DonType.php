<?php

namespace App\Form;

use App\Entity\CompetenceCombat\Don;
use App\Entity\CompetenceCombat\TypeDon;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', EntityType::class, [
                'class' => TypeDon::class,
                'choice_label' => 'libelle',
                'label' => "Type de don*",
                'required' => true,
                'placeholder' => 'Choisir le type de don',
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
            ->add('presRequis', TextType::class, [
                'label' => "Pres-requis",
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'ex : Entaille',
                ],
            ])
            ->add('initiative', IntegerType::class, [
                'label' => "Initiative*",
                'attr' => [
                    'class' => 'form-control required-field positive-integer',
                    'placeholder' => 'Saisissez un nombre',
                ],
            ])
            ->add('effet', TextareaType::class, [
                'label' => "Effet(s)*",
                'attr' => [
                    'class' => 'form-control required-field',
                    'placeholder' => 'ex : Saignement',
                    'required' => true,
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Don::class,
        ]);
    }
}
