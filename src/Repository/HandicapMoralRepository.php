<?php

namespace App\Repository;

use App\Entity\HandicapMoral;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HandicapMoral>
 *
 * @method HandicapMoral|null find($id, $lockMode = null, $lockVersion = null)
 * @method HandicapMoral|null findOneBy(array $criteria, array $orderBy = null)
 * @method HandicapMoral[]    findAll()
 * @method HandicapMoral[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HandicapMoralRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HandicapMoral::class);
    }

//    /**
//     * @return HandicapMoral[] Returns an array of HandicapMoral objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?HandicapMoral
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
