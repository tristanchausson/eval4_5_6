<?php

namespace App\Repository;

use App\Entity\Achats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Achats|null find($id, $lockMode = null, $lockVersion = null)
 * @method Achats|null findOneBy(array $criteria, array $orderBy = null)
 * @method Achats[]    findAll()
 * @method Achats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AchatsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Achats::class);
    }

//    /**
//     * @return Achats[] Returns an array of Achats objects
//     */
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
    public function findOneBySomeField($value): ?Achats
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
