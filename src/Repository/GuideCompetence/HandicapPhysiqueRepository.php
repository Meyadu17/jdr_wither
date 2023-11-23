<?php

namespace App\Repository\GuideCompetence;

use App\Entity\GuideCompetence\HandicapPhysique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HandicapPhysique>
 *
 * @method HandicapPhysique|null find($id, $lockMode = null, $lockVersion = null)
 * @method HandicapPhysique|null findOneBy(array $criteria, array $orderBy = null)
 * @method HandicapPhysique[]    findAll()
 * @method HandicapPhysique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HandicapPhysiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HandicapPhysique::class);
    }

}
