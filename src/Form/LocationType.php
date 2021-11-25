<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDebut')
            ->add('dateRetour')
            ->add('prix')
            ->add('client', EntityType::class,
            ['class'=>'App\Entity\Client',
                'choice_label'=>'nom',
                'expanded'=>false,
                'multiple'=>false])
            ->add('voitureLoc', EntityType::class,
                ['class'=>'App\Entity\Voiture',
                    'choice_label'=>'serie',
                    'expanded'=>false,
                    'multiple'=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
