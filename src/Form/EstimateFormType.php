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

class EstimateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('clientName', TextType::class)
            ->add('clientEmail', EmailType::class)
            ->add('clientPhone', TextType::class)
            ->add('clientAddress', TextType::class)
            ->add('clientCity', TextType::class)
            ->add('dresstype', TextType::class)
            ->add('customizations', TextType::class)
            ->add('fabric', TextType::class)
            ->add('fabricColor', TextType::class)
            ->add('size', TextType::class)
            ->add('pricefabric', NumberType::class)
            ->add('quantity', NumberType::class)
            ->add('totalExTax', NumberType::class)
            ->add('tva', NumberType::class)
            ->add('totalIncTax', NumberType::class)
            ->add('balandeDue', NumberType::class)
            ->add('expectedDeliveryDate', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('deliveryMode', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Estimate']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Estimate::class,
        ]);
    }
}
