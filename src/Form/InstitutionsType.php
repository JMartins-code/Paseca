<?php

namespace App\Form;

use App\Entity\Institutions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InstitutionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeInstitution')
            ->add('nomInstitution')
            ->add('typeInstitution')
            ->add('contactResponsable')
            ->add('nomResponsable')
            ->add('histoireInstitution')
            ->add('contextInstitution')
            ->add('textReference')
            ->add('structureInstitution')
            ->add('gestionArchive')
            ->add('batimentInstitution')
            ->add('fondArchive')
            ->add('instrumentRecherche')
            ->add(
                'heureOuverture',
                TimeType::class,
                ['widget' => 'single_text', 'attr' => ['class' => "mdc-text-field__input", 'id' => "text-field-hero-input"]]
            )
            ->add('conditionAcces')
            ->add('accessibiliteInstitution')
            ->add('serviceAide')
            ->add('serveiceReproduction')
            ->add('espacePublic')
            ->add('idServiceDescription')
            ->add('regleConvention')
            ->add('niveauElaboration')
            ->add('niveauDetail')
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
            ->add('langueEcriture')
            ->add('sourceInstitution')
            ->add('noteMAJ');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Institutions::class,
        ]);
    }
}