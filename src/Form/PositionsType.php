<?php

namespace App\Form;

use App\Entity\Positions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PositionsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    final public function buildForm(FormBuilderInterface $builder, array $options): void
	{
        $builder
            ->add('position')
            ->add('position_options', ChoiceType::class, [
                'choices'=> [
                    'Administrator'=>'ROLE_ADMIN',
                    'Class Teacher'=>'ROLE_CLASS_TEACHER',
                    'Teacher'=>'ROLE_TEACHER',
                    'Student'=>'ROLE_STUDENT',
                    'Other Users'=>'ROLE_USER',
				],
                'multiple'=>true,
                'mapped'=>false,
			]);
    }

    /**
     * {@inheritdoc}
     */
    final public function configureOptions(OptionsResolver $resolver): void
	{
        $resolver->setDefaults(array(
            'data_class' => Positions::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    final public function getBlockPrefix(): ?string
	{
        return Positions::class;
    }


}
