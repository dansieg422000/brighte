<?php

namespace App\PropertyAnalyticBundle\Controller;

//use App\PropertyAnalyticBundle\Controller\BaseController;
use App\PropertyAnalyticBundle\DTO\ViewData\PropertyAnalyticsView;
use App\PropertyAnalyticBundle\Entity\PropertyAnalytics;
use App\PropertyAnalyticBundle\Form\ApiFormType;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\View\View;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Defines Property Analytics resource actions and API Documentations.
 */
class PropertyAnalyticController extends BaseController
{
    /**
     * Retrieves the collection of Analytics for an inputted Property.
     *
     * @Get("/property-analytics")
     *
     * @param Request $request
     *
     * @return Response $response
     */
    public function getAnalyticsAction(Request $request)
    {
        $form = $this->createForm(ApiFormType::class);

        if ($this->processForm($form, $request)) {
            $requestData = $form->getData();
            $paginator   = $this->getPropertyAnalyticService()->getPropertyAnalytics($requestData);
            $viewData    = $this->getSerializerService()->denormalizeCollection($paginator->getItems(), PropertyAnalyticsView::class);

//            $data = $this->view($viewData, Response::HTTP_OK, $paginator->getCustomHeaders());


            $presentation =  json_encode($viewData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

            $response = new Response($presentation);
            $response->headers->set('Content-Type', 'application/json');

            return $response;

//            var_dump(json_encode($viewData));
//            exit;
//
//            $response = new JsonResponse($viewData);
//
//            $response->headers->set('Content-Type', 'application/json');
//            return $response;

            return $this->view($viewData, Response::HTTP_OK, $paginator->getCustomHeaders());

        }

//        return $this->view($this->getFormErrors($form), Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
