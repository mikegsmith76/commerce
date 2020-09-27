<?php

namespace App\Repository;

use App\Entity\AttributeSet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AttributeSet|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttributeSet|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttributeSet[]    findAll()
 * @method AttributeSet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttributeSetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttributeSet::class);
    }

    // /**
    //  * @return AttributeSet[] Returns an array of AttributeSet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AttributeSet
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
