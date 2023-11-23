<?php

namespace App\Repository\GuideCompetence;

use App\Entity\GuideCompetence\HandicapMoral;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HandicapMoral>
 *
 * @method HandicapMoral|null find($id, $lockMode = null, $lockVersion = null)
 * @method HandicapMoral|null findOneBy(array $criteria, array $orderBy = null)
 * @method HandicapMoral[]    findAll()
 * @method HandicapMoral[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HandicapMoralRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HandicapMoral::class);
    }

}
