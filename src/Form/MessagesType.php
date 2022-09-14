<?php

namespace App\Form;

use App\Entity\Messages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessagesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'attr'=>['autofocus'=>true,'class'=>'input']
                ])
            ->add('email', EmailType::class,[
                'attr'=>['autofocus'=>true,'class'=>'input']
            ])
            ->add('phone', TextType::class,[
                'attr'=>['autofocus'=>true,'class'=>'input']
            ])

            ->add('subject', TextType::class,[
                'attr'=>['autofocus'=>true,'class'=>'input']
            ])
            ->add('message',TextareaType::class,[
                'attr'=>['autofocus'=>true,'class'=>'input']
            ])
            ->add('GONDER', SubmitType::class,[
                'attr'=>['autofocus'=>true,'class'=>'primary-btn']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Messages::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id'   => 'contactform',
        ]);
    }
}
