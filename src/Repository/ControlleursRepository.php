<?php

namespace App\Repository;

use App\Entity\Controlleurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Controlleurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Controlleurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Controlleurs[]    findAll()
 * @method Controlleurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ControlleursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Controlleurs::class);
    }

    // /**
    //  * @return Controlleurs[] Returns an array of Controlleurs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Controlleurs
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
