<?php

namespace App\Repository\Stuff;

use App\Entity\Stuff\EncombrementArmure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EncombrementArmure>
 *
 * @method EncombrementArmure|null find($id, $lockMode = null, $lockVersion = null)
 * @method EncombrementArmure|null findOneBy(array $criteria, array $orderBy = null)
 * @method EncombrementArmure[]    findAll()
 * @method EncombrementArmure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EncombrementArmureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EncombrementArmure::class);
    }
}
