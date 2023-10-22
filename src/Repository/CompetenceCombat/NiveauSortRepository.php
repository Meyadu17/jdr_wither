<?php

namespace App\Repository\CompetenceCombat;

use App\Entity\CompetenceCombat\NiveauSort;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NiveauSort>
 *
 * @method NiveauSort|null find($id, $lockMode = null, $lockVersion = null)
 * @method NiveauSort|null findOneBy(array $criteria, array $orderBy = null)
 * @method NiveauSort[]    findAll()
 * @method NiveauSort[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NiveauSortRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NiveauSort::class);
    }

//    /**
//     * @return NiveauSort[] Returns an array of NiveauSort objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NiveauSort
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
