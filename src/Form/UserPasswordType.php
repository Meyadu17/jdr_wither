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

class UserPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('currentPassword', PasswordType::class, [
                'label' => 'Mot de passe actuel* :',
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control required-field',
                    'required' => true,
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent correspondre',
                'first_options'  => ['label' => 'Mot de passe*'],
                'second_options' => ['label' => 'Confirmer Mot de passe*'],
                'mapped' => false,
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
