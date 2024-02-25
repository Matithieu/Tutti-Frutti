<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
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
                    //'Nom du groupe' => 'groupName',
                    //'Label' => 'label',
                    //'Genre' => 'genre',
                    //'Format' => 'format',
                ],
                'label' => 'Choisir le type de filtre',
                'placeholder' => 'Sélectionnez un filtre',
            ])

            ->add('filterValue', TextType::class, [
                'label' => 'Valeur du filtre',
                'required' => false,
            ]);

        // Debug: Data is null idk why. function not working. But the idea is here.
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $form = $event->getForm();
            $data = $event->getData();

            if ($data != null && $data['filterType'] === 'fruit') {
                $form->add('filterValue', ChoiceType::class, [
                    'choices' => [
                        'Banane' => 'banane',
                        'Pomme' => 'pomme',
                        'Poire' => 'poire',
                        'Fraise' => 'fraise',
                        'Orange' => 'orange',
                    ],
                    'label' => 'Valeur du filtre',
                    'placeholder' => 'Sélectionnez une valeur',
                    'required' => false,
                ]);
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}
