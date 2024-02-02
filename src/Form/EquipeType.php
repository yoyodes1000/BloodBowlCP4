<?php

namespace App\Form;

use App\Entity\Championnat;
use App\Entity\Equipe;
use App\Entity\Race;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('users', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
            ->add('races', EntityType::class, [
                'class' => Race::class,
'choice_label' => 'id',
            ])
            ->add('championnats', EntityType::class, [
                'class' => Championnat::class,
'choice_label' => 'id',
'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipe::class,
        ]);
    }
}
