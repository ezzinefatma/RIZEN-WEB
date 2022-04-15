<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StreamUserUpdateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreStream')
            ->add('categorie',ChoiceType::class,
                [
                    'choices'  =>
                        [
                            'Action' => 'Action',
                            'Adventure' => 'Adventure',
                            'Role_Playing' => 'Role_Playing',
                            'FPS'=>'FPS',
                            'Strategy'=>'Strategy',
                            'Racing'=>'Racing',
                            'E_sport'=>'E_sport'
                        ],

                ])
            ->add('url')

            ->add('status',ChoiceType::class ,
                [
                    'choices'  =>
                        [
                            'online' => 'online',
                            'offline' => 'offline',

                        ],

                ])



            ->add('backgroundPic', FileType::class , array('data_class' => null))


            ->add('Modifier',SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
