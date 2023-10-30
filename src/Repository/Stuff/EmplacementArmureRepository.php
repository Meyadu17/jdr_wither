<?php

namespace App\Repository\Stuff;

use App\Entity\Stuff\EmplacementArmure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EmplacementArmure>
 *
 * @method EmplacementArmure|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmplacementArmure|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmplacementArmure[]    findAll()
 * @method EmplacementArmure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmplacementArmureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmplacementArmure::class);
    }

//    /**
//     * @return TypeArmure[] Returns an array of TypeArmure objects
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

//    public function findOneBySomeField($value): ?TypeArmure
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
