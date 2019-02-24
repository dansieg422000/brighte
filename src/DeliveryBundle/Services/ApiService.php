<?php

namespace App\DeliveryBundle\Services;

use Symfony\Component\HttpFoundation\JsonResponse;

class ApiService
{
    public function validateEnterprise($token, $key, $enterpriseDelivery)
    {
        $isValidate = $this->validateToken($token, $key);

        if ($isValidate) {
            $this->clientApi($enterpriseDelivery);
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

    private function clientApi($enterpriseDelivery)
    {
        $url = $this->generateUrl('client_api', ['enterpriseDelivery' => $enterpriseDelivery]);
        return $this->redirectToRoute($url);
    }


}