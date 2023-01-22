<?php

namespace App\Form;

use App\Entity\Exercice;
use App\Entity\ExerciceDone;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExerciceDoneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('repetitionNb')
            ->add('serie')
            ->add('weight')
            ->add('exerciceName', EntityType::class, [
                'class' => Exercice::class,
                'choice_label' => 'name',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExerciceDone::class,
        ]);
    }
}
