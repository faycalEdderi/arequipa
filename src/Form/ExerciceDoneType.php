<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Exercice;
use App\Entity\ExerciceDone;
use App\Repository\ExerciceRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Validator\Constraints\NotBlank;



class ExerciceDoneType extends AbstractType
{
    private $token;

    public function __construct(TokenStorageInterface $token)
    {
        $this->token = $token;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $this->token->getToken()->getUser();


        $builder
            ->add('date')
            ->add('repetitionNb')
            ->add('serie')
            ->add('weight')
            ->add('exerciceName', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez sélectionner un exercice.']),
                ],
            ]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExerciceDone::class,
        ]);
    }
}
