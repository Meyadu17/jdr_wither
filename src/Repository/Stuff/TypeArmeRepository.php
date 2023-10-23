<?php

namespace App\Repository\Stuff;

use App\Entity\Stuff\TypeArme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeArme>
 *
 * @method TypeArme|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeArme|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeArme[]    findAll()
 * @method TypeArme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeArmeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeArme::class);
    }

//    /**
//     * @return Type[] Returns an array of Type objects
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

//    public function findOneBySomeField($value): ?Type
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
