<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


// Création du formulaire d'inscription + ajout d'un nouvel utilisateur

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Création du formulaire d'inscription + ajout d'un nouvel utilisateur
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('email', EmailType::class) // type email pour obliger la vérication du champ par le navigateur
            ->add(
                'gender',
                ChoiceType::class, // type choix multiple
                [
                    'choices' => [
                        'Homme' => 'Homme',
                        'Femme' => 'Femme',
                        'Autre' => 'Autre',
                    ],
                    'expanded' => true, //affiche sous forme de boutons radio
                    'multiple' => false, //sélection unique
                    'label_attr' => ['class' => 'block text-sm font-medium leading-6 text-gray-900 flex justify-between'],
                    'attr' => ['class' => 'space-x-2'],
                ]
            )
            ->add('rgpd', CheckboxType::class, [
                'mapped' => true, // Permet d'enregistrer la valeur du champ dans l'entité
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos conditions d\'utilisation.', // Message d'erreur si la case n'est pas cochée
                    ]),
                ],
                'required' => true,
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe ne correspondent pas.', // Message d'erreur si les mots de passe ne correspondent pas
                'options' => [
                    'attr' => [
                        'class' => 'block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6',
                        'autocomplete' => 'new-password' // Empêche le navigateur de remplir automatiquement le champ 
                    ]
                ],
                'required' => true,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmer le mot de passe'],
                'constraints' => [
                    new NotBlank([ // Champ obligatoire
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 8, // Longueur minimale du mot de passe selon les critères de sécurité
                        'minMessage' => 'Vous devez entrer un mot de passe d\'au moins {{ limit }} caractères',
                        'max' => 4096, // Longueur maximale du mot de passe
                    ]),
                ],
            ]);
    }

    // Configuration des options
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
