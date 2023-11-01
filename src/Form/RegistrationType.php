<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints as Assert;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo',null, [
                'label' => 'Pseudo*',
                'attr' => [
                    'class' => 'form-control required-field',
                    'placeholder' => 'dupont66',
                    'required' => true,
                ],
            ])
            ->add('email',null, [
                'label' => 'Email*',
                'attr' => [
                    'class' => 'form-control required-field unique-email',
                    'placeholder' => 'j.dupont@gmail.com',
                    'required' => true,
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent correspondre',
                'first_options'  => ['label' => 'Mot de passe*'],
                'second_options' => ['label' => 'Confirmer Mot de passe*'],
                'attr' => [
                    'class' => 'form-control required-field',
                    'required' => true,
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Regex([
                        'pattern' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z])(?=.*[#?!@$;.%§^&*-]).{8,}$/',
                        'message' => 'Le mot de passe doit respecter les contraintes suivantes : minimum 8 caractères, au moins 1 chiffre, au moins 1 majuscule, au moins 1 minuscule, au moins 1 caractère spécial (#?!@$;.%§^&*-).',
                    ]),
                ],
            ])
            ->add('photo', FileType::class, [
                'label' => 'Photo (PNG, JPG, BMP):',
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
            'data_class' => User::class,
        ]);
    }
}
