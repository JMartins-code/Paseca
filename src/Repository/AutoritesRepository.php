<?php

namespace App\Repository;

use App\Entity\Autorites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Autorites|null find($id, $lockMode = null, $lockVersion = null)
 * @method Autorites|null findOneBy(array $criteria, array $orderBy = null)
 * @method Autorites[]    findAll()
 * @method Autorites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutoritesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Autorites::class);
    }

    // /**
    //  * @return Autorites[] Returns an array of Autorites objects
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
    public function findOneBySomeField($value): ?Autorites
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
