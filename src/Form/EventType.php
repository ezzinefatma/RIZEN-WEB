<?php

namespace App\Form;

use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreEvent')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('imageEvent', FileType::class , array('data_class' => null))
            ->add('descriptionEvent')
            ->add('capacite')
            ->add('typeEvent',ChoiceType::class ,
                [
                    'choices'  =>
                        [
                            'online' => 'online',
                            'gaming_house' => 'gaming_house',

                        ],

                ])
            ->add('Ajouter',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
