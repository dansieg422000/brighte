<?php
namespace App\DeliveryBundle\Services;


class MarketingService
{

    public function successfulCampaign($emailcampaign)
    {
        return $isSuccessful = ($emailcampaign) ? true : false;
    }

}