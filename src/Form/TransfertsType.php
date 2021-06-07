<?php

namespace App\Form;

use App\Entity\Archives;
use App\Entity\Controlleurs;
use App\Entity\Institutions;
use App\Entity\Transferts;
use App\Entity\Utilisateurs;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Tywpe\CollectionType;

class TransfertsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numExemplaire')
            ->add('numRefTransfert')
            ->add('nbreFaitEnregistrement')
            ->add('observationsTransfert')
            ->add(
                'dateOuvertureRegistre',
                DateType::class,
                ['widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'attr' => ['class' => "mdc-text-field__input", 'id' => "text-field-hero-input"]]
            )
            ->add(
                'dateFermeture',
                DateType::class,
                ['widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'attr' => ['class' => "mdc-text-field__input", 'id' => "text-field-hero-input"]]
            )
            ->add('codePlanClasse')
            ->add('codeRegleGestion')
            ->add(
                'dateTransfert',
                DateType::class,
                ['widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'attr' => ['class' => "mdc-text-field__input", 'id' => "text-field-hero-input"]]
            )
            ->add('responsableTransfert')
            ->add('formatArchive')
            ->add('supportArchive')
            ->add('nomOfficierSignataire')
            ->add('codeControlleur', EntityType::class, [
                'class' => Controlleurs::class,
                'choice_label' => 'codeUtilisateur.nom',
            ])
            ->add('codeInstitution', EntityType::class, [
                'class' => Institutions::class,
                'choice_label' => 'nomInstitution',
            ])
            ->add(
                'codeArchive',
                EntityType::class,
                [
                    'class' => Archives::class,
                    'choice_label' => 'numOrdre',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transferts::class,
        ]);
    }
}