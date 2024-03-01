<?php

namespace App\Form;

use App\Entity\Postava;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostavaFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('jmeno', TextType::class, [
                'label' => 'Jméno',
                'attr' => [
                    'class' => 'input-group',
                ]
            ])
            ->add('prijmeni', TextType::class, [
                'label' => 'Příjmení',
                'attr' => [
                    'class' => 'input-group',
                ]
            ])
            ->add('vek', TextType::class, [
                'label' => 'Věk',
                'attr' => [
                    'class' => 'input-group',
                ]
            ])
            ->add(
                'zvire',
                TextType::class,
                [
                    'label' => 'Zvíře',
                    'attr' => [
                        'class' => 'input-group',
                    ]
                ]
            )
            ->add('poslatDoDatabaze', SubmitType::class, [
                'label' => 'Poslat do PostgreSQL',
                'attr' => [
                    'class' => 'btn btn-success',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Postava::class,
        ]);
    }
}
