<?php

namespace App\Repository\Stuff;

use App\Entity\Stuff\Outil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<\App\Entity\Stuff\Outil>
 *
 * @method Outil|null find($id, $lockMode = null, $lockVersion = null)
 * @method Outil|null findOneBy(array $criteria, array $orderBy = null)
 * @method Outil[]    findAll()
 * @method Outil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OutilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Outil::class);
    }

    /**
     * Sélectionner les outils par nom
     * @return float|int|mixed|string
     */
    public function findOutilsByName()
    {
        return $this->createQueryBuilder('o')
            ->orderBy('o.nom', 'ASC')
            ->getQuery()
            ->getResult();

    }

    /**
     * Filtrer les outils en fonction du nom saisie
     * @param $nom
     * @return float|int|mixed|string
     */
    public function findOutilsFilteredByNom($nom)
    {
        return $this->createQueryBuilder('o')
            ->where('o.nom LIKE :nom')
            ->setParameter('nom', '%' . $nom . '%')
            ->orderBy('o.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
