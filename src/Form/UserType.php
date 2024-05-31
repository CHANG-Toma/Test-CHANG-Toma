<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// Création du formulaire de modification d'un utilisateur

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Création du formulaire de modification d'un utilisateur
        $builder
            ->add(
                'firstname',
                TextType::class,
                [
                    'label' => 'Prénom'
                ]

            )
            ->add(
                'lastname',
                TextType::class,
                [
                    'label' => 'Nom'
                ]
            )
            ->add('email', EmailType::class)
            ->add('gender', ChoiceType::class, [ // type choix multiple
                'choices' => [
                    'Homme' => 'Homme',
                    'Femme' => 'Femme',
                    'Autres' => 'Autres'
                ],
                'expanded' => false, //affiche sous forme de boutons radio
                'multiple' => false, //sélection unique
                'label' => 'Genre'
            ])
            ->add('rgpd', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false
                ],
                'expanded' => true, //affiche des boutons radio
                'multiple' => false, //sélection unique
                'label_attr' => ['class' => 'mr-3'],
                'label' => 'RGPD'

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

