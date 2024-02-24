<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiscogsMasterFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('filterType', ChoiceType::class, [
                'choices' => [
                    'Fruit' => 'fruit',
                    'Année' => 'year',
                    'Nom du groupe' => 'groupName',
                    'Label' => 'label',
                    'Genre' => 'genre',
                    'Format' => 'format',
                ],
                'label' => 'Choisir le type de filtre',
                'placeholder' => 'Sélectionnez un filtre',
            ])
            ->add('filterValue', TextType::class, [
                'label' => 'Valeur de filtre',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}
