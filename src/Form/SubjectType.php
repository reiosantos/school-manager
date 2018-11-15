<?php

namespace App\Form;

use App\Entity\Subject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubjectType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    final public function buildForm(FormBuilderInterface $builder, array $options): void
	{
        $builder
            ->add('subjectNo', TextType::class)
            ->add('subjectName', TextType::class)
            ->add('subjectCategory', ChoiceType::class, [
                'choices' => [
                    'Mandatory' => 'Mandatory',
                    'Optional' => 'Optional',
				]
				]
            );
    }

    /**
     * {@inheritdoc}
     */
    final public function configureOptions(OptionsResolver $resolver): void
	{
        $resolver->setDefaults(array(
            'data_class' => Subject::class,
        ));
    }
}
