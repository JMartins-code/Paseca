<?php

namespace App\Form;

use App\Entity\Autorites;
use App\Entity\Producteurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Utilisateurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProducteursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeProducteurs')
            ->add(
                'autorite',
                EntityType::class,
                [
                    'class' => Autorites::class,
                    'choice_label' => 'numImmatriculation',
                ]
            )
            ->add('codeUtilisateur', EntityType::class, [
                'class' => Utilisateurs::class,
                'choice_label' => 'nom',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Producteurs::class,
        ]);
    }
}