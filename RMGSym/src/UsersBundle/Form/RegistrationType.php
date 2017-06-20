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
        $builder
        ->add("nom")
        ->add("prenom")
        ->add("adresse")
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'app_users_registration';
    }
    public function getNom()
    {
        return 'app_users_registration';
    }
}
