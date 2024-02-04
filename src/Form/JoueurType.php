<?php

namespace App\Form;

use App\Entity\Joueur;
use App\Entity\Race;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JoueurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Races', EntityType::class, [
                'class' => Race::class,
                'choice_label' => 'Name',
            ])
            ->add('nbMax', IntegerType::class)
            ->add('poste', TextType::class)
            ->add('cout', IntegerType::class)
            ->add('compMvmt', IntegerType::class)
            ->add('compForce', IntegerType::class)
            ->add('compAgilite', TextType::class)
            ->add('compPasse', TextType::class)
            ->add('compArmure', TextType::class)
            ->add('principale', TextType::class)
            ->add('secondaire', TextType::class)
            ->add('comp', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Joueur::class,
        ]);
    }
}
