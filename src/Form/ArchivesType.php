<?php

namespace App\Form;

use App\Entity\Archives;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Producteurs;
use App\Entity\Utilisateurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ArchivesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numOrdre')
            ->add('typologieDocumentaire', ChoiceType::class, [
                'choices' => [
                    'Selectionnez la typologie documentaire' => -1,
                    'Acte de naissance' => 'Naissance',
                    'Acte de mariage' => 'Mariage',
                    'Acte de décès' => 'Décès',
                ]
            ])
            ->add('statutArchive', ChoiceType::class, [
                'choices' => ['Statut du document'
                => ['Original' => 'Original', 'Copie' => 'Copie',]]
            ])
            ->add('paraphe')
            ->add('cote')
            ->add('nbreExemplaire')
            ->add('numInventaire')
            ->add(
                'dateDisposition',
                DateType::class,
                ['widget' => 'single_text', 'format' => 'yyyy-MM-dd']
            )
            ->add('nomResponsable', EntityType::class, [
                'class' => Utilisateurs::class,
                'choice_label' => 'nom',
            ])
            ->add('codeProducteur', EntityType::class, [
                'class' => Producteurs::class,
                'choice_label' => 'codeUtilisateur.nom',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Archives::class,
        ]);
    }
}