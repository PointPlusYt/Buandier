<?php

namespace App\Repository;

use App\Entity\Clothe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Clothe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clothe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clothe[]    findAll()
 * @method Clothe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClotheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clothe::class);
    }

    // /**
    //  * @return Clothe[] Returns an array of Clothe objects
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
    public function findOneBySomeField($value): ?Clothe
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
