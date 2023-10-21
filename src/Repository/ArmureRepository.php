<?php

namespace App\Repository;

use App\Entity\Stuff\Armure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Armure>
 *
 * @method Armure|null find($id, $lockMode = null, $lockVersion = null)
 * @method Armure|null findOneBy(array $criteria, array $orderBy = null)
 * @method Armure[]    findAll()
 * @method Armure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArmureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Armure::class);
    }

//    /**
//     * @return Armure[] Returns an array of Armure objects
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

//    public function findOneBySomeField($value): ?Armure
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
