<?php

namespace App\Form;

use App\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'label' => 'Nom du jeux'
            ])
            ->add('editeur', TextType::class,[
                'label' => 'Editeur Corps'
            ])
            ->add('developpeurs', TextType::class,[
                'label' => 'Developpeurs Corps'
            ])
            ->add('plateforme', TextType::class,[
                'label' => 'PlateForme'
            ])
            ->add('descript', TextareaType::class,[
                'label' => 'Description'
            ])
            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
