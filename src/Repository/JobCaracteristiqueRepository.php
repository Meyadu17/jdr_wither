<?php

namespace App\Repository;

use App\Entity\JobCaracteristique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JobCaracteristique>
 *
 * @method JobCaracteristique|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobCaracteristique|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobCaracteristique[]    findAll()
 * @method JobCaracteristique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobCaracteristiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobCaracteristique::class);
    }

//    /**
//     * @return JobCaracteristique[] Returns an array of JobCaracteristique objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('j.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?JobCaracteristique
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
