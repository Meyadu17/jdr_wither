<?php

namespace App\Repository\CompetenceCombat;

use App\Entity\CompetenceCombat\NiveauSigne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NiveauSigne>
 *
 * @method NiveauSigne|null find($id, $lockMode = null, $lockVersion = null)
 * @method NiveauSigne|null findOneBy(array $criteria, array $orderBy = null)
 * @method NiveauSigne[]    findAll()
 * @method NiveauSigne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NiveauDonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NiveauSigne::class);
    }
}
