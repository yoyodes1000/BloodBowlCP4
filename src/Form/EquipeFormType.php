<?php

namespace App\Form;

use App\Entity\Equipe;
use App\Entity\Race;
use App\Entity\User;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'choice_label' => 'title',
                'multiple' => true,
                'expanded' => true,
            ])
            /*->add('users', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
            ->add('races', EntityType::class, [
                'class' => Race::class,
                'choice_label' => 'id',
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipe::class,
        ]);
    }
}
