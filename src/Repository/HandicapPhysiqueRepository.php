<?php

namespace App\Repository;

use App\Entity\HandicapPhysique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HandicapPhysique>
 *
 * @method HandicapPhysique|null find($id, $lockMode = null, $lockVersion = null)
 * @method HandicapPhysique|null findOneBy(array $criteria, array $orderBy = null)
 * @method HandicapPhysique[]    findAll()
 * @method HandicapPhysique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HandicapPhysiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HandicapPhysique::class);
    }

//    /**
//     * @return HandicapPhysique[] Returns an array of HandicapPhysique objects
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

//    public function findOneBySomeField($value): ?HandicapPhysique
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
