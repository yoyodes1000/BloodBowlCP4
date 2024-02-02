<?php

namespace App\Form;

use App\Entity\Joueur;
use App\Entity\Race;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JoueurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nbMax')
            ->add('poste')
            ->add('cout')
            ->add('compMvmt')
            ->add('compForce')
            ->add('compAgilite')
            ->add('compPasse')
            ->add('compArmure')
            ->add('principale')
            ->add('secondaire')
            ->add('comp')
            ->add('Races', EntityType::class, [
                'class' => Race::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Joueur::class,
        ]);
    }
}
