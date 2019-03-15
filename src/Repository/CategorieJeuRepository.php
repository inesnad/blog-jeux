<?php

namespace App\Repository;

use App\Entity\CategorieJeu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategorieJeu|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieJeu|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieJeu[]    findAll()
 * @method CategorieJeu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieJeuRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategorieJeu::class);
    }

    // /**
    //  * @return CategorieJeu[] Returns an array of CategorieJeu objects
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
    public function findOneBySomeField($value): ?CategorieJeu
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
