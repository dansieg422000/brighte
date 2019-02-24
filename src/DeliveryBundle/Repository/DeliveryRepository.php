<?php

namespace App\DeliveryBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\DeliveryBundle\Entity\Delivery;

/**
 * @method Delivery|null find($id, $lockMode = null, $lockVersion = null)
 * @method Delivery|null findOneBy(array $criteria, array $orderBy = null)
 * @method Delivery[]    findAll()
 * @method Delivery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeliveryRepository extends ServiceEntityRepository
{
    private $jsonFile = '../src/DeliveryBundle/Repository/delivery.json';

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Delivery::class);
    }

    public function loadDelivery()
    {
        return $this->parseDeliveryData();
    }


    private function parseDeliveryData()
    {
        $deliveryJson = file_get_contents($this->jsonFile);

        return $deliveryJson;
    }
}
