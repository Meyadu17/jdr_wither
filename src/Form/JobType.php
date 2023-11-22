<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\Talent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
                'label' => "Nom*",
                'attr' => [
                    'class' => 'form-control required-field',
                    'placeholder' => 'ex : elfe',
                    'required' => true,
                ],
            ])
            ->add('presrequis', TextType::class, [
                'label' => "Pres requis",
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'ex : elfe',
                    'required' => true,
                ],
            ])
            ->add('bonusCaracteristiques', ChoiceType::class, [
                'label' => "Bonus aux caractéristiques",
                'choices' => [
                    'Force' => 'Force',
                    'Charme' => 'Charme',
                    'Sagacité' => 'Sagacité',
                    'Habileté' => 'Habileté',
                ],
                'multiple' => true,
                'expanded' => true, // Pour afficher les choix sous forme de checkbox
                'attr' => [
                    'class' => 'form-control form-check-input',
                ],
            ])
            ->add('bonusTalent', ChoiceType::class, [
                'label' => 'Bonus aux talents',
                'choices' => [
                    'Acrobaties' => 'Acrobaties',
                    'Alchimie' => 'Alchimie',
                    'Artisanat' => 'Artisanat',
                    'Connaissances' => 'Connaissances',
                    'Détection' => 'Détection',
                    'Diplomatie' => 'Diplomatie',
                    'Escalade' => 'Escalade',
                    'Furtivité' => 'Furtivité',
                    'Intuition' => 'Intuition',
                    'Larcin' => 'Larcin',
                    'Lutte' => 'Lutte',
                    'Piège' => 'Piège',
                    'Pistage' => 'Pistage',
                    'Soins' => 'Soins',
                    'Spectacle' => 'Spectacle',
                    'Survie' => 'Survie',
                ],
                'multiple' => true,
                'expanded' => true, // Pour afficher les choix sous forme de checkbox
                'attr' => [
                    'class' => 'form-control form-check-input',
                ],
            ])
            ->add('photo', FileType::class, [
                'label' => 'Photo (PNG, JPG, BMP)',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                            'image/bmp',
                        ],
                        'mimeTypesMessage' => 'Veuillez uploader un PNG ou un JPG',
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
