<?php

namespace App\PropertyAnalyticBundle\Form;

use App\PropertyAnalyticBundle\ErrorCode;
use App\PropertyAnalyticBundle\Form\DataType\SimpleArrayType;
use App\PropertyAnalyticBundle\Services\Pagination\Paginator;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Type;

/**
 * Maintain default fields for list form type.
 */
//abstract class ApiFormType extends FormType
Class ApiFormType extends FormType
{
    /**
     * Builds default form type fields.
     *
     * @param FormBuilderInterface $builder The form builder
     * @param array                $options The options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('suburb', TextType::class)
            ->add('sort', SimpleArrayType::class)
            ->add('page', TextType::class, [
                'empty_data' => Paginator::DEFAULT_PAGE,
                'constraints' => new Type([
                    'type' => 'numeric',
                    'payload' => ['error_code' => ErrorCode::INVALID_TYPE],
                ]),
            ])
            ->add('limit', TextType::class, [
                'empty_data' => Paginator::DEFAULT_LIMIT,
                'constraints' => new Type([
                    'type' => 'numeric',
                    'payload' => ['error_code' => ErrorCode::INVALID_TYPE],
                ]),
            ]);
    }
}
