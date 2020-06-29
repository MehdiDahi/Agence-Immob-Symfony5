<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Mahdilib\RecaptchaBundle\Type\RecaptchaSubmitType;

class ContactType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('firstName', TextType::class)
                ->add('lastName', TextType::class)
                ->add('phone', TextType::class)
                ->add('email', EmailType::class)
                ->add('message', TextareaType::class)
                ->add('recaptcha', RecaptchaSubmitType::class, [
                    'label' => 'Envoyer',
                    'attr' => [
                        'class' => 'btn btn-primary'
                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {

        $resolver->setDefaults([
            'data_class' => Contact::class
        ]);
    }

}
