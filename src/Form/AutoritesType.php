<?php

namespace App\Form;

use App\Entity\Autorites;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AutoritesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeAutorite')
            ->add('typeAutorite')
            ->add('numImmatriculation')
            ->add('formeAutoNom')
            ->add('autreFormeNom')
            ->add('zoneGeographique')
            ->add(
                'dateCreation',
                DateType::class,
                ['widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'attr' => ['class' => "mdc-text-field__input", 'id' => "text-field-hero-input"]]
            )
            ->add(
                'dateDestruction',
                DateType::class,
                ['widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'attr' => ['class' => "mdc-text-field__input", 'id' => "text-field-hero-input"]]
            )
            ->add('histoireAutorite')
            ->add('statutJuridique')
            ->add('fonctionActivite')
            ->add('organisationInterne')
            ->add('typeRelation')
            ->add('descriptionRelation')
            ->add(
                'dateDebutRelation',
                DateType::class,
                ['widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'attr' => ['class' => "mdc-text-field__input", 'id' => "text-field-hero-input"]]
            )
            ->add(
                'dateFinRelation',
                DateType::class,
                ['widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'attr' => ['class' => "mdc-text-field__input", 'id' => "text-field-hero-input"]]
            )
            ->add('codeServiceDescription')
            ->add('regleConvention')
            ->add('statutAutorite')
            ->add('niveauDetail')
            ->add('langueEcriture')
            ->add('noteEntretien')
            ->add('natureRelation');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Autorites::class,
        ]);
    }
}