<?php

namespace App\Form;

use App\Entity\AuthUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegistrationFormType extends AbstractType
{
    final public function buildForm(FormBuilderInterface $builder, array $options): void
	{
        $builder
			->add('userNo', TextType::class, [
				'constraints'=>[new Length(['min'=>13, 'max'=>13])],'label'=>'ID Number', 'attr'=>['required'=>true]
			])
            ->add('username')
			->remove('email')
        ;
    }

    final public function configureOptions(OptionsResolver $resolver): void
	{
        $resolver->setDefaults([
            'data_class' => AuthUser::class,
        ]);
    }

    final public function getParent(): ?string
	{
		return \FOS\UserBundle\Form\Type\RegistrationFormType::class;
	}
}
