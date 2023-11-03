<?php

namespace App\Repository\CompetenceCombat;

use App\Entity\CompetenceCombat\Sort;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<\App\Entity\CompetenceCombat\Sort>
 *
 * @method Sort|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sort|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sort[]    findAll()
 * @method Sort[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SortRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sort::class);
    }

    /**
     * @return Sort[] Retourne un tableau d'objet de sorts
     */
    public function findSortsGroupedByType()
    {
        $qb = $this->createQueryBuilder('s')
            ->join('s.niveauSort', 'ns')
            ->orderBy('ns.libelle', 'ASC')
            ->addOrderBy('s.nom', 'ASC') // Ajout du critère de tri par nom
            ->getQuery();

        $result = $qb->getResult();

        $sortsGroupedByType = [];
        foreach ($result as $sort) {
            $niveau = $sort->getNiveauSort();
            $sortsGroupedByType[$niveau->getLibelle()][] = $sort;
        }

        return $sortsGroupedByType;
    }

    /**
     * @param string $nom Le nom du sort à filtrer
     * @return Sort[] Retourne un tableau d'objet du sort filtré par nom
     */
    public function findSortsFilteredByNom($nom)
    {
        $qb = $this->createQueryBuilder('s')
            ->join('s.niveauSort', 'ns')
            ->where('s.nom LIKE :nom')
            ->setParameter('nom', '%' . $nom . '%')
            ->orderBy('ns.id', 'ASC')
            ->getQuery();

        $result = $qb->getResult();

        $sortsGroupedByType = [];
        foreach ($result as $sort) {
            $niveau = $sort->getNiveauSort();
            $sortsGroupedByType[$niveau->getLibelle()][] = $sort;
        }

        return $sortsGroupedByType;
    }
}
