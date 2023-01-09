<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [

                'label' => 'Prenom',
                'label_attr' => [
                    'class' => 'text-stone-900 text-lg '
                ],
                'attr' => [
                    'class' => 'block 
                    py-2.5 
                    px-0 
                    w-full 
                    text-sm 
                    text-white 
                    bg-transparent 
                    border-0 
                    border-b-2 
                    border-stone-900 
                    appearance-none 
                    focus:outline-none 
                    focus:ring-0 
                    focus:border-pink-700 
                    peer'
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'label_attr' => [
                    'class' => 'text-stone-900 text-lg '
                ],
                'attr' => [
                    'class' => 'block 
                    py-2.5 
                    px-0 
                    w-full 
                    text-sm 
                    text-white 
                    bg-transparent 
                    border-0 
                    border-b-2 
                    border-stone-900 
                    appearance-none 
                    focus:outline-none 
                    focus:ring-0 
                    focus:border-pink-700 
                    peer'
                ],




            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Accepter les CGU',
                'attr' => [

                    'class' => ' bg-gray-100 rounded border-gray-300 '
                ],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accpter les conditions',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'Prenom',
                'label_attr' => [
                    'class' => 'text-stone-900 text-lg '
                ],
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'block 
                    py-2.5 
                    px-0 
                    w-full 
                    text-sm 
                    text-white 
                    bg-transparent 
                    border-0 
                    border-b-2 
                    border-stone-900 
                    appearance-none 
                    focus:outline-none 
                    focus:ring-0 
                    focus:border-pink-700 
                    peer'
                ],
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                // 'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
