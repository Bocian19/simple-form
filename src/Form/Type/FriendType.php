<?php

namespace App\Form\Type;

use App\Entity\Friend as Friend;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class FriendType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cars', CollectionType::class, [
                // each entry in the array will be a text field
                'entry_type' => TextType::class,
                'allow_add' => true,
                'allow_delete' => true,
                // these options are passed to each "car" type
                'entry_options' => [
                    'attr' => ['class' => 'car-box'],
                ]
            ])

            ->add('save', SubmitType::class, [
                'label' => 'Zapisz'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Friend::class,
        ]);
    }
}