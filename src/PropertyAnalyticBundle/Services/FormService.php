<?php

namespace App\PropertyAnalyticBundle\Services;

use App\PropertyAnalyticBundle\ErrorCode;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\Validator\ConstraintViolation;

/**
 * Maintain custom logic related to Symfony Form object.
 */
class FormService
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * Constructor.
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * Add some manually checking to the request before submit and validate form.
     * The purpose is used as an replacement for $form->handleRequest()
     * to adapt Request json process and handle Form with GET method more exact.
     *
     * @param FormInterface $form
     * @param Request       $request
     *
     * @return bool Whether submitted Form is valid or not
     */
    public function processForm(FormInterface $form, Request $request)
    {
        if ($request->isMethodSafe()) {
            $data = $request->query->all();
        } else {
            $data = json_decode($request->getContent(), true);
        }

        $clearMissing = Request::METHOD_PATCH !== $request->getMethod();
        $form->submit($data, $clearMissing);

        return $form->isValid();
    }

    /**
     * Create view form errors.
     *
     *
     * @param FormInterface $form
     *
     * @return array
     */
    public function createViewError(FormInterface $form)
    {
        return [
            'message' => $this->translator->trans('performance-api.validation_failed'),
            'errors' => $this->createDetailErrors($form),
        ];
    }

    /**
     * Rebuild form detail errors structure.
     *
     *
     * @param FormInterface $form
     *
     * @return array Form error structure
     */
    private function createDetailErrors(FormInterface $form)
    {
        $errors = [];

        foreach ($form->getErrors() as $error) {
            $parent = $form->getParent();
            $errors[] = [
                'resource' => !$parent ? $form->getName() : $parent->getName(),
                'field' => $parent ? $form->getName() : null,
                'code' => $this->getErrorCode($error),
                'message' => $this->getErrorMessage($error),
            ];
        }

        $childErrors = [];
        foreach ($form->all() as $childForm) {
            if ($childForm instanceof FormInterface && $childError = $this->createDetailErrors($childForm)) {
                $childErrors[] = $childError;
            }
        }

        if ($childErrors) {
            $errors = array_merge($errors, ...$childErrors);
        }

        return $errors;
    }

    /**
     * Get form error code.
     *
     * @param FormError $error
     *
     * @return string
     */
    private function getErrorCode(FormError $error)
    {
        $cause = $error->getCause();

        if (!$cause instanceof ConstraintViolation || !$cause->getConstraint()) {
            return null;
        }

        if (empty($cause->getConstraint()->payload['error_code'])) {
            return ErrorCode::UNKNOWN;
        }

        return $cause->getConstraint()->payload['error_code'];
    }

    /**
     * Get form error message.
     *
     * @param FormError $error
     *
     * @return string
     */
    private function getErrorMessage(FormError $error)
    {
        $domain = 'validators';

        if (null !== $error->getMessagePluralization()) {
            return $this->translator->transChoice(
                $error->getMessageTemplate(),
                $error->getMessagePluralization(),
                $error->getMessageParameters(),
                $domain
            );
        }

        return $this->translator->trans($error->getMessageTemplate(), $error->getMessageParameters(), $domain);
    }
}
