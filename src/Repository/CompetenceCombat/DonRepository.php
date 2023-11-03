<?php

namespace App\Repository\CompetenceCombat;

use App\Entity\CompetenceCombat\Don;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<\App\Entity\CompetenceCombat\Don>
 *
 * @method Don|null find($id, $lockMode = null, $lockVersion = null)
 * @method \App\Entity\CompetenceCombat\Don|null findOneBy(array $criteria, array $orderBy = null)
 * @method \App\Entity\CompetenceCombat\Don[]    findAll()
 * @method Don[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, \App\Entity\CompetenceCombat\Don::class);
    }

    /**
     * Sélectionner les dons par nom
     * @return float|int|mixed|string
     */
    public function findDonsByName()
    {
        return $this->createQueryBuilder('d')
            ->orderBy('d.nom', 'ASC')
            ->getQuery()
            ->getResult();

    }

    /**
     * Filtrer les dons en fonction du nom saisie
     * @param $nom
     * @return float|int|mixed|string
     */
    public function findDonsFilteredByNom($nom)
    {
        return $this->createQueryBuilder('d')
            ->where('d.nom LIKE :nom')
            ->setParameter('nom', '%' . $nom . '%')
            ->orderBy('d.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
