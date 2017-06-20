<?php
// src/UsersBundle/Form/RegistrationType.php

namespace UsersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add("nom");
        $builder ->add("prenom");
        $builder ->add("adresse");
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
       return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
