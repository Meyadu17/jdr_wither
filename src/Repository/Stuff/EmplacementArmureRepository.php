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
}
