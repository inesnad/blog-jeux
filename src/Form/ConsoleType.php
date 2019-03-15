<?php

namespace App\Form;

use App\Entity\Console;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomConsole')
            ->add('marque')
            ->add('couleur')
            ->add('sortieAv')
            ->add('etat')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Console::class,
        ]);
    }
}
