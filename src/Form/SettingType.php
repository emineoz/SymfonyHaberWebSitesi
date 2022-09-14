<?php

namespace App\Form;

use App\Entity\Setting;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SettingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('keywords')
            ->add('description')
            ->add('company')
            ->add('adress')
            ->add('phone')
            ->add('fax')
            ->add('email')
            ->add('smtpserver')
            ->add('smtpemail')
            ->add('smtppassword')
            ->add('smtpport')


            ->add('contact', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                    'toolbar'=>'full'


                ),
            ))
            ->add('aboutus', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                    'toolbar'=>'full'


                ),
            ))
            ->add('status', ChoiceType::class, [
                'choices'  => [

                    'True' => 'True',
                    'False' => 'False'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Setting::class,
        ]);
    }
}
