<?php

namespace App\PropertyAnalyticBundle\Repository;

use App\PropertyAnalyticBundle\Entity\PropertyAnalytics;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @method PropertyAnalytics|null find($id, $lockMode = null, $lockVersion = null)
 * @method PropertyAnalytics|null findOneBy(array $criteria, array $orderBy = null)
 * @method PropertyAnalytics[]    findAll()
 * @method PropertyAnalytics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyAnalyticsRepository extends EntityRepository
{
    /**
     * Create query builder for Property Analytics collection
     *
     * @param mixed $requestData
     *
     * @return \Doctrine\ORM\QueryBuilder
     * @throws \Doctrine\ORM\Query\QueryException
     */
    public function createPropertyAnalyticsBuilder($requestData)
    {
//        echo 'PropertAnalyticsRepository';
//        var_dump($requestData);
//        exit;
//        $qBuilder = $this->createQueryBuilder('pScore')
//
//            ->join('pScore.performance', 'performance')
//            ->join('performance.employee', 'employee')
//            ->join('performance.manager', 'manager')
//            ->join('performance.appraisal', 'appraisal')
////            ->join('performance.workflows', 'workflow', Join::WITH, 'workflow.workflowId = :workflow360Id AND workflow.deleted = 0')
//            ->where('
//                performance.phase != :pPhase AND
//                pScore.reviewer = :reviewerUser AND
//                performance.deleted = 0
//            ')
////            ->setParameter('pPhase', PerformanceWorkflow::PHASE_COMPLETE)
//            ->setParameter('reviewerUser', $owner);
////            ->setParameter('workflow360Id', PerformanceWorkflow::WORKFLOW_MULTIRATER);
////            ->addCriteria(self::create360ReviewCriteria())
////            ->addCriteria(self::createNonFinalizedCriteria())
////            ->addCriteria(self::createNonDeletedCriteria());
//
//        return $qBuilder->getQuery()->getResult();

        return $qb = $this->createQueryBuilder('pa')
            ->orderBy('pa.value', 'DESC');
//        $query = $qb->getQuery()->getResult();
//
//        return $query;

    }

    // /**
    //  * @return PropertyAnalytics[] Returns an array of PropertyAnalytics objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PropertyAnalytics
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
