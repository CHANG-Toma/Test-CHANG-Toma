<?php

namespace App\Form;

use App\Entity\Estimate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EstimateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('clientName', TextType::class, [
                'label' => 'Nom du client',
            ])
            ->add('clientEmail', EmailType::class, [
                'label' => 'Email du client',
            ])
            ->add('clientPhone', TextType::class, [
                'label' => 'Téléphone du client',
            ])
            ->add('clientAddress', TextType::class, [
                'label' => 'Adresse du client',
            ])
            ->add('clientCity', TextType::class, [
                'label' => 'Ville du client',
            ])
            ->add('dresstype', TextType::class, [
                'label' => 'Type de robe',
            ])
            ->add('customizations', TextType::class, [
                'label' => 'Personnalisations',
            ])
            ->add('fabric', TextType::class, [
                'label' => 'Tissu',
            ])
            ->add('fabricColor', TextType::class, [
                'label' => 'Couleur du tissu',
            ])
            ->add('size', TextType::class, [
                'label' => 'Taille',
            ])
            ->add('pricefabric', NumberType::class, [
                'label' => 'Prix du tissu',
            ])
            ->add('quantity', NumberType::class, [
                'label' => 'Quantité',
            ])
            ->add('totalExTax', NumberType::class, [
                'label' => 'Total hors taxe',
            ])
            ->add('tva', NumberType::class, [
                'label' => 'TVA',
            ])
            ->add('totalIncTax', NumberType::class, [
                'label' => 'Total TTC',
            ])
            ->add('balandeDue', NumberType::class, [
                'label' => 'Solde dû',
            ])
            ->add('expectedDeliveryDate', DateType::class, [
                'label' => 'Date de livraison prévue',
                'widget' => 'single_text',
                'required' => true,
                'empty_data' =>  (new \DateTime())->format('Y-m-d'),
            ])
            ->add('deliveryMode', TextType::class, [
                'label' => 'Mode de livraison',
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer le devis']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Estimate::class,
        ]);
    }
}
