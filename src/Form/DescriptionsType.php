<?php

namespace App\Form;

use App\Entity\Descriptions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Transferts;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DescriptionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeDescription')
            ->add('etatMateriel')
            ->add('natureArchive')
            ->add(
                'codeArchive',
                EntityType::class,
                [
                    'class' => Transferts::class,
                    'choice_label' => 'numExemplaire',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Descriptions::class,
        ]);
    }
}