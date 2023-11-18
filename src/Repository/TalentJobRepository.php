<?php

namespace App\Repository;

use App\Entity\TalentJob;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TalentJob>
 *
 * @method TalentJob|null find($id, $lockMode = null, $lockVersion = null)
 * @method TalentJob|null findOneBy(array $criteria, array $orderBy = null)
 * @method TalentJob[]    findAll()
 * @method TalentJob[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TalentJobRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TalentJob::class);
    }

//    /**
//     * @return TalentJob[] Returns an array of TalentJob objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TalentJob
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
