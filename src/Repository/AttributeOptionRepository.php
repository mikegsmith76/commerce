<?php

namespace App\Repository;

use App\Entity\AttributeOption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AttributeOption|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttributeOption|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttributeOption[]    findAll()
 * @method AttributeOption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttributeOptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttributeOption::class);
    }

    // /**
    //  * @return AttributeOption[] Returns an array of AttributeOption objects
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
    public function findOneBySomeField($value): ?AttributeOption
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
