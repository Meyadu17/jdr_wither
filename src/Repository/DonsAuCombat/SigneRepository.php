<?php

namespace App\Repository\DonsAuCombat;

use App\Entity\Signe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Signe>
 *
 * @method \App\Entity\Signe|null find($id, $lockMode = null, $lockVersion = null)
 * @method \App\Entity\Signe|null findOneBy(array $criteria, array $orderBy = null)
 * @method \App\Entity\Signe[]    findAll()
 * @method Signe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SigneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, \App\Entity\Signe::class);
    }

//    /**
//     * @return Signe[] Returns an array of Signe objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Signe
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
