<?php

namespace App\Form;

use App\Entity\Archivistes;
use App\Entity\Institutions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Utilisateurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArchivistesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeArchiviste')
            ->add(
                'institution',
                EntityType::class,
                [
                    'class' => Institutions::class,
                    'choice_label' => 'nomInstitution',
                ]
            )
            ->add(
                'codeUtilisateur',
                EntityType::class,
                [
                    'class' => Utilisateurs::class,
                    'choice_label' => 'nom',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Archivistes::class,
        ]);
    }
}