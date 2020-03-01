<?php

namespace App\PropertyAnalyticBundle\Services;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
//use Elmo\PerformanceBundle\DTO\RequestData\PerformanceListQuery;
//use Elmo\PerformanceBundle\Entity\PerformanceScore;
use App\PropertyAnalyticBundle\Entity\PropertyAnalytics;
use App\PropertyAnalyticBundle\Repository\PropertyAnalyticsRepository;
use App\PropertyAnalyticBundle\Services\Pagination\PaginatorInterface;
//use Elmo\UserBundle\Entity\User;
use PhpParser\Node\Expr\Array_;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * PropertyAnalyticService will process all business logic that is related to Performance Review 360
 */
class PropertyAnalyticService
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var PropertyAnalyticsRepository
     */
    private $propertyAnalyticsRepository;

    /**
     * @var PaginatorInterface
     */
    private $paginator;

    /**
     * PropertyAnalyticService constructor.
     *
     * @param EntityManagerInterface   $entityManager
     * @param PaginatorInterface    $paginator
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        PaginatorInterface $paginator
    ) {
        $this->entityManager = $entityManager;
        $this->propertyAnalyticsRepository = $entityManager->getRepository(PropertyAnalytics::class);
//        $this->propertyAnalyticsRepository = $this->entityManager->getRepository(PropertyAnalytics::class);
        $this->paginator = $paginator;
    }

    /**
     * Get paginated Property Analytics
     *
     * @param $requestData
     *
     * @return PaginatorInterface
     */
    public function getPropertyAnalytics($requestData)
    {
        $qBuilder = $this->propertyAnalyticsRepository->createPropertyAnalyticsBuilder($requestData);

        return $this->paginator->paginate($qBuilder, $requestData['page'], $requestData['limit']);
    }
}
