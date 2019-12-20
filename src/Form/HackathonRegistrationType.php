<?php

namespace App\Form;

use App\Entity\HackathonRegistration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HackathonRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FirstName', TextType::class)
            ->add('LastName', TextType::class)
            ->add('EmailAddress', EmailType::class)
            ->add('PhoneNumber', NumberType::class)
            ->add('Promotion', TextType::class)
            ->add('NameProject', TextType::class)
            ->add('DescribeProject', TextType::class)
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HackathonRegistration::class,
        ]);
    }
}
