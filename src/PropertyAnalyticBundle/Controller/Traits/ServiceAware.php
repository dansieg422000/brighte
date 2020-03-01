<?php

namespace App\PropertyAnalyticBundle\Controller\Traits;

use Doctrine\ORM\EntityManagerInterface;
use App\PropertyAnalyticBundle\Services\FormService;
use App\PropertyAnalyticBundle\Services\PropertyAnalyticService;
use App\PropertyAnalyticBundle\Services\SerializerService;
use App\PropertyAnalyticBundle\Services\DenormalizerService;
use Knp\Component\Pager\Paginator;

/**
 * Maintain reusable methods getting specific services.
 */
trait ServiceAware
{
    /**
     * Gets a container service by its id.
     *
     * @param string $id The service id
     *
     * @return mixed The service
     */
//    abstract public function get($id);

    /**
     * @return EntityManagerInterface
     */
    protected function getEntityManager()
    {
        return $this->get('doctrine.orm.default_entity_manager');
    }

    /**
     * @return AccessControllerService
     */
    protected function getAccessControllerService()
    {
        return $this->get('performance.service.access_controller');
    }

    /**
     * @return Paginator
     */
    protected function getPaginator()
    {
        return $this->get('knp_paginator');
    }

    /**
     * @return FormService
     */
    protected function getFormService()
    {
        return $this->get('archistar.service.form');
    }

    /**
     * @return SerializerService
     */
    protected function getSerializerService()
    {
        return $this->get('archistar.service.serializer');
    }

    /**
     * @return PropertyAnalyticService
     */
    protected function getPropertyAnalyticService()
    {
        return $this->get('archistar.service.property_analytic');
    }


}
