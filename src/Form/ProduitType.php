<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('categorieProd', ChoiceType::class,
                [
                    'choices'  =>
                        [
                            'Jeux' => 'Jeux',
                            'Hardware' => 'Hardware']  ])
            ->add('libelle')
            ->add('marque')
            ->add('prix')
            ->add('descriptionProd')
            ->add('imageProd', filetype())

            ->add('disponibilite', ChoiceType::class,
                [
                    'choices'  =>
                        [
                            'En Stock' => 'En Stock',
                            'Hors Stock' => 'Hors Stock']  ])
            ->add('note')
            ->add('quantite')
            ->add('ajouter',SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
