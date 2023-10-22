<?php

namespace App\Repository\Stuff;

use App\Entity\EquipementGeneral;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<\App\Entity\EquipementGeneral>
 *
 * @method EquipementGeneral|null find($id, $lockMode = null, $lockVersion = null)
 * @method \App\Entity\EquipementGeneral|null findOneBy(array $criteria, array $orderBy = null)
 * @method \App\Entity\EquipementGeneral[]    findAll()
 * @method EquipementGeneral[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipementGeneralRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipementGeneral::class);
    }

//    /**
//     * @return EquipementGeneral[] Returns an array of EquipementGeneral objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EquipementGeneral
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
