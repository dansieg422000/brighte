<?php

namespace App\DeliveryBundle\Services;

use Symfony\Component\HttpFoundation\JsonResponse;

class ApiService
{
    private $curlMethod = 'POST';

    private $clientApiUrl = '';

    public function validateEnterprise($token, $key, $enterpriseDelivery)
    {

        $this->clientApiUrl = $this->getParameters('client_api');

        $isValidate = $this->validateToken($token, $key);

        if ($isValidate) {
            $this->clientApi($this->curlMethod, $this->clientApiUrl, $enterpriseDelivery);
        } else {
            return new JsonResponse(json_encode(array('error'=>'Access denied!')));
        }
    }

    private function validateToken($token, $key) {
        $params = self::decrypt($token, $key);
        if ($params) {
            $parts = explode(';', $params);

            if (count($parts) <= 1) {
                return false;
            }

            $timeout = array_shift($parts);
            if ($timeout < time()) {
                return false;
            }

            return $parts;
        } else {
            return false;
        }
    }

    private static function decrypt($string, $key='AbCd192837')
    {
        $result = '';
        //replace space with + to avoid url encode problem
        $string = str_replace(' ', '+', $string);
        $string = base64_decode($string);
        $string = str_replace($key, '', $string);
        for($i=0; $i<strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key))-1, 1);
            $char = chr(ord($char)-ord($keychar));
            $result.=$char;
        }
        return $result;
    }

    function clientApi($method, $url, $enterpriseDelivery)
    {
        $curl = curl_init();

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($enterpriseDelivery)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $enterpriseDelivery);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($enterpriseDelivery)
                    $url = sprintf("%s?%s", $url, http_build_query($enterpriseDelivery));
        }

        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }


}