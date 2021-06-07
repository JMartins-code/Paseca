<?php

namespace App\Form;

use App\Entity\Utilisateurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add(
                'dateNaissance',
                DateType::class,
                ['widget' => 'single_text', 'format' => 'yyyy-MM-dd']
            )
            ->add('lieuNaissance')
            ->add('numTelephone')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Administrateur' => 'ROLE_ADMIN',
                    'Poducteur' => 'ROLE_PRODU',
                    'Contrôleur' => 'ROLE_CONTR',
                    'Archiviste' => 'ROLE_ARCHI',
                ],
                'expanded' => false,
                'multiple' => true,
                'label' => 'Profil'
            ])
            /*->add('agreeTerms', CheckboxType::class, [
                'label' => "clause de confidentialités",
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Verifiez l\'accord de confidentialité des données.',
                    ]),
                ],
            ])*/
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit comporter au moins {{ min }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateurs::class,
        ]);
    }
}