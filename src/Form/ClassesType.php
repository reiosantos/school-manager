<?php

namespace App\Form;

use App\Entity\Classes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClassesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    final public function buildForm(FormBuilderInterface $builder, array $options): void
	{
        $builder
            ->add('className')
            ->add('class_options', ChoiceType::class, array(
                'choices'=>array(
                    'S.1'=>'S1',
                    'S.2'=>'S2',
                    'S.3'=>'S3',
                    'S.4'=>'S4',
                    'S.5'=>'S5',
                    'S.6'=>'S6',
                ),
                'multiple'=>true,
                'mapped'=>false,
            ));
    }

    /**
     * {@inheritdoc}
     */
    final public function configureOptions(OptionsResolver $resolver): void
	{
        $resolver->setDefaults(array(
            'data_class' => Classes::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    final public function getBlockPrefix(): ?string
	{
        return Classes::class;
    }


}
