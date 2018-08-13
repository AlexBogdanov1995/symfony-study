<?php

namespace App\Form;

use App\Entity\Rectangle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RectangleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('width')
            ->add('height')
            ->add('background_color')
            ->add('border_radius')
            ->add('border_width')
            ->add('border_color')
            ->add('border_style')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rectangle::class,
        ]);
    }
}
