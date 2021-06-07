<?php

namespace App\Repository;

use App\Entity\CodeUtilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CodeUtilisateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method CodeUtilisateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method CodeUtilisateur[]    findAll()
 * @method CodeUtilisateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodeUtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CodeUtilisateur::class);
    }

    // /**
    //  * @return CodeUtilisateur[] Returns an array of CodeUtilisateur objects
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
    public function findOneBySomeField($value): ?CodeUtilisateur
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
