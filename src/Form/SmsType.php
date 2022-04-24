<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SmsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder



->add( 'number' , TextType::class , [
    'label'=>'numéro de telephone',
    'attr'=>[
        'placeholder'=>'numéro de telephone',
    ],
    ])
            ->add( 'sender' , TextType::class , [
                'label'=>' sender',
                'attr'=>[
                    'placeholder'=>'sender',
                ],
            ])
        ->add( 'message' , TextType::class , [
            'label'=>' message',
            'attr'=>[
                'placeholder'=>'message',
            ],
        ])
            ->add( 'submit' , SubmitType::class , [
                'label'=>' Envoyer',
                'attr'=>[
                    'class'=>'btn btn-primary',
                ],
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
