<?php

namespace App\PropertyAnalyticBundle\Form;

use Symfony\Component\Form\AbstractType as SymfonyFormType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Maintain common form type methods.
 */
abstract class FormType extends SymfonyFormType
{
    /**
     * Configures the default options for all form type.
     *
     * @param OptionsResolver $resolver the resolver for the options
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
        ]);
    }
}
