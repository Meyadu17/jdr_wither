<?php

namespace App\Form;

use App\Entity\Stuff\Arme;
use App\Entity\Stuff\Taille;
use App\Entity\Stuff\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArmeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => "Nom* :"
            ])
            ->add('degat', TextType::class, [
                'label' => "Dégâts :"
            ])
            ->add('mains', TextType::class, [
                'label' => "Mains :"
            ])
            ->add('portee', TextType::class, [
                'label' => "Effet :"
            ])
            ->add('effet', TextType::class, [
                'label' => "Effet(s)* :"
            ])
            ->add('poids', TextType::class, [
                'label' => "Poids* :"
            ])
            ->add('prix', TextType::class, [
                'label' => "Prix* :"
            ])
            ->add('taille', EnumType::class, [
                'class' => Taille::class,
                'label' => "Taille* :",
            ])
            ->add('type', EnumType::class, [
                'class' => Type::class,
                'label' => "Type d\'arme* :"
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
