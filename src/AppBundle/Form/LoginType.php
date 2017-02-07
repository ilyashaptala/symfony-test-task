<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LoginType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'attr' => [
                    'class' => 'input-lg',
                    'placeholder' => 'Username',
                    'autocomplete' => 'off'
                ]
            ])
            ->add('password', PasswordType::class, [
                'attr' => [
                    'class' => 'input-lg',
                    'placeholder' => 'Password'
                ]
            ])
            ->add('btn', SubmitType::class, [
                'label' => 'Login',
                'attr' => [
                    'class' => 'btn-success btn-block btn-lg'
                ]
            ]);
    }
}