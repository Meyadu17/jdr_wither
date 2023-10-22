<?php

namespace App\Repository\Stuff;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<\App\Entity\Stuff\Arme>
 *
 * @method \App\Entity\Stuff\Arme|null find($id, $lockMode = null, $lockVersion = null)
 * @method \App\Entity\Stuff\Arme|null findOneBy(array $criteria, array $orderBy = null)
 * @method \App\Entity\Stuff\Arme[]    findAll()
 * @method \App\Entity\Stuff\Arme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArmeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, \App\Entity\Stuff\Arme::class);
    }

//    /**
//     * @return Arme[] Returns an array of Arme objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Arme
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
