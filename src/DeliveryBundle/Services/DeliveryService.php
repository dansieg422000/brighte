<?php
namespace App\DeliveryBundle\Services;

use App\DeliveryBundle\Services\ApiService;
use App\DeliveryBundle\Services\MarketingService;
use App\DeliveryBundle\Repository\DeliveryRepository;

class DeliveryService
{
    private $key = '';

    private $token = '';

    private $deliveryData;

    private $apiService;

    private $marketingService;

    private $deliveryRepository;

    private $emailCampaign = 'email';

    private $enterpriseDelivery = 'enterpriseDelivery';

    public function __construct(ApiService $apiValidationController,
                                MarketingService $marketingService,
                                DeliveryRepository $deliveryRepository)
    {
        $this->apiService = $apiValidationController;
        $this->marketingService = $marketingService;
        $this->deliveryRepository = $deliveryRepository;
    }

    public function processDeliveryData()
    {
        $data = $this->deliveryRepository->loadDelivery();

        $this->deliveryData = json_decode($data, TRUE);

        foreach ($this->deliveryData as $kDeliveries => $vDeliveries) {

            if ($this->deliveryData[$kDeliveries]['deliveryType'] == $this->enterpriseDelivery) {
                $this->processEnterpriseDelivery($this->deliveryData[$kDeliveries]);
            } elseif ($this->deliveryData[$kDeliveries]['source'] == $this->emailCampaign) {
                $this->processEmailCampaign($this->deliveryData[$kDeliveries]);
            } else {
                $this->processPersonalDelivery($this->deliveryData[$kDeliveries]);
            }
        }
    }

    /**
     * @param $enterpriseDelivery
     */
    private function processEnterpriseDelivery($enterpriseDelivery)
    {
        $this->apiService->validateEnterprise($this->token, $this->key, $enterpriseDelivery);
    }

    /**
     * @param $emailCampaign
     */
    private function processEmailCampaign($emailCampaign)
    {
        $isSuccessful = $this->marketingService->successfulCampaign($emailCampaign);

        if ($isSuccessful) echo "Email campaign is successful";
    }

    /**
     * @param $personalDelivery
     */
    private function processPersonalDelivery($personalDelivery)
    {
        echo '<pre>';
        print_r($personalDelivery);
        echo '</pre>';
    }


}