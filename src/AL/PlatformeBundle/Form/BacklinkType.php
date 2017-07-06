<?php

namespace AL\PlatformeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BacklinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('target')
            ->add('deal')
            ->add('url')
            ->add('anchor')
            ->add('seller')
            ->add('save', SubmitType::class)
        ;
    }


}
