<?php

namespace App\Repository;

use App\Entity\TalentCaracteristique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TalentCaracteristique>
 *
 * @method TalentCaracteristique|null find($id, $lockMode = null, $lockVersion = null)
 * @method TalentCaracteristique|null findOneBy(array $criteria, array $orderBy = null)
 * @method TalentCaracteristique[]    findAll()
 * @method TalentCaracteristique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TalentCaracteristiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TalentCaracteristique::class);
    }

//    /**
//     * @return TalentCaracteristique[] Returns an array of TalentCaracteristique objects
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

//    public function findOneBySomeField($value): ?TalentCaracteristique
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
