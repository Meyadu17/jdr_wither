<?php

namespace App\Repository\CompetenceCombat;

use App\Entity\CompetenceCombat\Signe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<\App\Entity\CompetenceCombat\Signe>
 *
 * @method Signe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Signe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Signe[]    findAll()
 * @method Signe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SigneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, \App\Entity\CompetenceCombat\Signe::class);
    }

    /**
     * @return Signe[] Retourne un tableau d'objet de signes
     */
    public function findSignesGroupedByType()
    {
        $qb = $this->createQueryBuilder('s')
            ->join('s.niveauSigne', 'ns')
            ->orderBy('ns.libelle', 'ASC')
            ->addOrderBy('s.nom', 'ASC') // Ajout du critère de tri par nom
            ->getQuery();

        $result = $qb->getResult();

        $signesGroupedByType = [];
        foreach ($result as $signe) {
            $niveau = $signe->getNiveauSigne();
            $signesGroupedByType[$niveau->getLibelle()][] = $signe;
        }

        return $signesGroupedByType;
    }

    /**
     * @param string $nom Le nom du signe à filtrer
     * @return Signe[] Retourne un tableau d'objet du signe filtré par nom
     */
    public function findSignesFilteredByNom($nom)
    {
        $qb = $this->createQueryBuilder('s')
            ->join('s.niveauSigne', 'ns')
            ->where('s.nom LIKE :nom')
            ->setParameter('nom', '%' . $nom . '%')
            ->orderBy('ns.id', 'ASC')
            ->getQuery();

        $result = $qb->getResult();

        $signesGroupedByType = [];
        foreach ($result as $signe) {
            $niveau = $signe->getNiveauSigne();
            $signesGroupedByType[$niveau->getLibelle()][] = $signe;
        }

        return $signesGroupedByType;
    }
}
