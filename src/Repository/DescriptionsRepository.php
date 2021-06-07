<?php

namespace App\Repository;

use App\Entity\Descriptions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Descriptions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Descriptions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Descriptions[]    findAll()
 * @method Descriptions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DescriptionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Descriptions::class);
    }

    // /**
    //  * @return Descriptions[] Returns an array of Descriptions objects
    //  */
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
    /*public function findArchive()
    {
        return $this->createQueryBuilder('d')
            ->innerJoin()
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }*/

    /*
    public function findOneBySomeField($value): ?Descriptions
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}