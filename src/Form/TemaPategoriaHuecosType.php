<?php

namespace App\Form;

use App\Entity\TemaPategoria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TemaPategoriaHuecosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('frase', TextareaType::class, [
                'label' => ' ',
                'attr' => [
                    'class' => 'texto'
                ],
//                'mapped' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
//            'data_class' => TemaPategoria::class,
        ]);
    }
}
