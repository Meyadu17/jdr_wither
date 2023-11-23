<?php

namespace App\Repository\GuideCompetence;

use App\Entity\GuideCompetence\Quete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Quete>
 *
 * @method Quete|null find($id, $lockMode = null, $lockVersion = null)
 * @method Quete|null findOneBy(array $criteria, array $orderBy = null)
 * @method Quete[]    findAll()
 * @method Quete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QueteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Quete::class);
    }

}
