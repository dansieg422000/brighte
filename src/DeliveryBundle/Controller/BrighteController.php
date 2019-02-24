<?php

namespace App\DeliveryBundle\Controller;

use App\DeliveryBundle\Services\DeliveryService;
use Symfony\Component\HttpFoundation\Response;

class BrighteController
{

    protected $deliveryService;

    protected $deliveryData;

    public function __construct(DeliveryService $deliveryService)
    {
        $this->deliveryService = $deliveryService;
    }

    public function delivery()
    {
        $this->processDelivery();

        return new Response();
    }

    private function processDelivery()
    {
        $this->deliveryData = $this->deliveryService->processDeliveryData();

        return $this->deliveryData;
    }

}