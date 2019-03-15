<?php

namespace App\Repository;

use App\Entity\Ecran;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ecran|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ecran|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ecran[]    findAll()
 * @method Ecran[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EcranRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ecran::class);
    }

    // /**
    //  * @return Ecran[] Returns an array of Ecran objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ecran
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
