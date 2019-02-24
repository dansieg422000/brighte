<?php
namespace App\DeliveryBundle\Services;

use App\DeliveryBundle\Services\MarketingService;
use App\DeliveryBundle\Repository\DeliveryRepository;

class DeliveryService
{
    private $deliveryData;

    private $marketingService;

    private $deliveryRepository;

    private $emailCampaign = 'email';

    private $enterpriseDelivery = 'enterpriseDelivery';

    public function __construct(MarketingService $marketingService, DeliveryRepository $deliveryRepository)
    {
        $this->marketingService = $marketingService;
        $this->deliveryRepository = $deliveryRepository;
    }

    public function processDeliveryData()
    {
        $data = $this->deliveryRepository->loadDelivery();

        $this->deliveryData = json_decode($data, TRUE);

        foreach ($this->deliveryData as $deliveries) {
            foreach ($deliveries as $delivery) {
                if ($deliveries['deliveryType'] == $this->enterpriseDelivery) {
                    $this->processEnterpriseDelivery($delivery);
                } else if ($deliveries['source'] == $this->emailCampaign) {
                    $this->processEmailCampaign($delivery);
                } else {
                    $this->processPersonalDelivery($delivery);
                }
            }
        }
    }

    /**
     * @param $enterpriseDelivery
     */
    private function processEnterpriseDelivery($enterpriseDelivery)
    {
        echo '<pre>';
        print_r($enterpriseDelivery);
        echo '</pre>';

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