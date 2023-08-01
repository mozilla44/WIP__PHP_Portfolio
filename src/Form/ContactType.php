<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
            ->add('email', EmailType::class, [
                'attr' => ['placeholder' => 'Votre email'],
                'help' => 'Cet email ne sera utilisé que pour vous répondre.',
                'constraints' => [
                    new Email,
                    new NotBlank
                ]
                
            ])
            ->add('subject', TextType::class, [
                'attr' => ['placeholder' => 'Sujet de votre message'],
                'label' => 'Sujet de votre message',
                'constraints' => [
                    new NotBlank
                ]
            ])
            ->add('message', TextareaType::class, [
                'attr' => ['placeholder' => 'Votre mesage'],
                'label' => 'Votre message',
                'constraints' => [
                    new NotBlank
                ]
            ])
            ->add('envoyer', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
