<?php

namespace App\PropertyAnalyticBundle\Form\DataType;

use App\PropertyAnalyticBundle\Form\DataTransformer\SimpleArrayTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Performance phase type.
 */
class SimpleArrayType extends AbstractType
{
    /**
     * Add data transformation for phase type.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new SimpleArrayTransformer($options['delimiter']));
    }

    /**
     * Set up default configurations for phase type such as
     * - Delimiter.
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'delimiter' => ',',
            ]
        );
    }

    /**
     * Returns class of parent type which phase type base on.
     */
    public function getParent()
    {
        return TextType::class;
    }
}
