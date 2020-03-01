<?php

namespace App\PropertyAnalyticBundle\Controller;

use App\PropertyAnalyticBundle\Controller\Traits\ServiceAware;
use FOS\RestBundle\Controller\FOSRestController;
use Swagger\Annotations as SWG;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * BaseController defines common methods for reusable in child controller.
 * 
 * @SWG\Swagger(
 *     schemes={"http", "https"},
 *     host="archistar.com",
 *     basePath="/property-analytic-api/",
 *     @SWG\Info(
 *         title="PropertyAnalytic API",
 *         version="1.0.0"
 *     ),
 *     @SWG\SecurityScheme(
 *         securityDefinition="CookieAuth",
 *         name="Cookie",
 *         type="apiKey",
 *         in="header"
 *     )
 * )
 */
abstract class BaseController extends FOSRestController
{
    use ServiceAware;

    /**
     * Creates a serializer view.
     *
     * Convenience method to create a FOSRestBundle View with serialization support.
     *
     * @param mixed $data             View data
     * @param array $serializerGroups View data serialization groups
     * @param array $headers          HTTP Response header
     *
     * @return \FOS\RestBundle\View\View
     */
    protected function serializerView($data, array $serializerGroups = [], array $headers = [])
    {
        echo 'dito';
        exit;
        $view = $this->view($data, Response::HTTP_OK, $headers);

        if ($serializerGroups) {
            $view->getSerializationContext()->setGroups($serializerGroups);
        }

        return $view;
    }

    /**
     * Handling form submission and validation.
     *
     * @param FormInterface $form
     * @param Request       $request
     *
     * @return bool Whether submitted Form is valid or not
     */
    protected function processForm(FormInterface $form, Request $request)
    {
        return $this->getFormService()->processForm($form, $request);
    }

    /**
     * Get Form Errors.
     *
     * @param FormInterface $form
     *
     * @return array
     */
    protected function getFormErrors(FormInterface $form)
    {
        return $this->getFormService()->createViewError($form);
    }

    /**
     * Gets the repository for an entity class.
     *
     * @param string $className
     *
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    protected function getRepository($className)
    {
        return $this->getEntityManager()->getRepository($className);
    }

    /**
     * Check permission for controller action.
     *
     * @param string $accessControllerName This is the access controller we are going to use
     * @param string $actionName           This is the function we want to check accessibility
     * @param array  $extraParams          This is the extra params we pass into the access controller
     *
     * @return void
     */
    protected function checkPermission($accessControllerName, $actionName, $extraParams = [])
    {
        $ac = $this->getAccessControllerService()->getAccessController($accessControllerName);
        if (!$ac->hasPermission($actionName, $extraParams)) {
            throw $this->createAccessDeniedException();
        }
    }
}
