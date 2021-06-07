<?php

namespace App\Repository;

use App\Entity\Archivistes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Archivistes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Archivistes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Archivistes[]    findAll()
 * @method Archivistes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArchivistesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Archivistes::class);
    }

    // /**
    //  * @return Archivistes[] Returns an array of Archivistes objects
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
    public function findOneBySomeField($value): ?Archivistes
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