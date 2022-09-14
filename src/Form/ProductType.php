<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Product;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('category', EntityType::class,[
                'attr'=>['autofocus'=>true,'class'=>'form-control'],
                'class'=>Categories::class,
                'choice_label'=>function(Categories $rs){
                return sprintf('(%d) %s',$rs->getId(),$rs->getCategory());
                },
                'placeholder'=>'Choose an Category'
            ])



            ->add('title', TextType::class,[
                'attr'=>['autofocus'=>true,'class'=>'input']
            ])
            ->add('keywords', TextType::class,[
                'attr'=>['autofocus'=>true,'class'=>'input']
            ])
            ->add('description', TextType::class,[
                'attr'=>['autofocus'=>true,'class'=>'input']
            ])
            ->add('image', FileType::class,[
                'label' => 'Product Image: ',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '3048k',
                        'mimeTypes' => [
                           'image/*',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid Image File',
                    ])
                ],
            ])


            ->add('detail', CKEditorType::class, array(
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
            ->add('slug', TextType::class,[
        'attr'=>['autofocus'=>true,'class'=>'input']
    ])
           // ->add('category')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
