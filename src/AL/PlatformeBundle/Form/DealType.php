<?php

namespace AL\PlatformeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DealType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sellername')
            ->add('username')
            ->add('url')
            ->add('target')
            ->add('price')
            ->add('save', SubmitType::class)
        ;
    }


}
