<?php
namespace App\Controller;

use App\Entity\DeliveryEntity;
use Doctrine\ORM\EntityManager;
use App\Repository\DeliveryRepository;
use Doctrine\ORM\ServiceEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class BrighteController extends Controller
{
    public function __construct()
    {

    }


    public function delivery()
    {
//        DeliveryRepository::parseDelivery();


//        echo '<pre>';
//        var_dump($em);
//        echo '</pre>';
//        exit;
//        echo 'here';
//        exit;
        $em = $this->getDoctrine()->getManager();
        $em
            ->getRepository('DeliveryRepository')
            ->parseDelivery();
        exit;
        $this->getDoctrine()->getRepository('DeliveryRepository')->parseDelivery();
    }

}