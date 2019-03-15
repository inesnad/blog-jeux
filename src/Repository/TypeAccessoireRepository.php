<?php

namespace App\Repository;

use App\Entity\TypeAccessoire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeAccessoire|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAccessoire|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAccessoire[]    findAll()
 * @method TypeAccessoire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAccessoireRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeAccessoire::class);
    }

    // /**
    //  * @return TypeAccessoire[] Returns an array of TypeAccessoire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeAccessoire
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
