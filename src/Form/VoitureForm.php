<?php


namespace App\Form;



use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class VoitureForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('serie', TextType::class)
            ->add('date_mise_circulation', DateType::class)
        ->add('modele', TextType::class)
            ->add('marque', EntityType::class,
                ['class'=>'App\Entity\Modele',
                    'choice_label'=>'libelle',
                    'multiple'=>false,
                    'expanded'=>false])
        ;
    }

    public function getName(){
        return "Voiture";
    }
}

