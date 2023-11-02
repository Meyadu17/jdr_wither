<?php

namespace App\Repository\Stuff;

use App\Entity\Stuff\EquipementGeneral;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<\App\Entity\Stuff\EquipementGeneral>
 *
 * @method EquipementGeneral|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipementGeneral|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipementGeneral[]    findAll()
 * @method EquipementGeneral[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipementGeneralRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipementGeneral::class);
    }

    /**
     * @return EquipementGeneral[] Retourne un tableau d'objet d'équipement général
     */
    public function findEquipementsGroupedByType()
    {
        $qb = $this->createQueryBuilder('eg')
            ->join('eg.categorieFourniture', 'cf')
            ->orderBy('cf.libelle', 'ASC')
            ->addOrderBy('eg.nom', 'ASC') // Ajout du critère de tri par nom
            ->getQuery();

        $result = $qb->getResult();

        $equipementGroupedByType = [];
        foreach ($result as $equipement) {
            $categorieFourniture = $equipement->getCategorieFourniture();
            $equipementGroupedByType[$categorieFourniture->getLibelle()][] = $equipement;
        }

        return $equipementGroupedByType;
    }

    /**
     * @param string $nom Le nom de l'équipement à filtrer
     * @return EquipementGeneral[] Retourne un tableau d'objet d'équipement filtré par nom
     */
    public function findEquipementsFilteredByNom($nom)
    {
        $qb = $this->createQueryBuilder('eg')
            ->join('eg.categorieFourniture', 'cf')
            ->where('eg.nom LIKE :nom')
            ->setParameter('nom', '%' . $nom . '%')
            ->orderBy('cf.id', 'ASC')
            ->getQuery();

        $result = $qb->getResult();

        $equipementGroupedByType = [];
        foreach ($result as $equipement) {
            $categorieFourniture = $equipement->getCategorieFourniture();
            $equipementGroupedByType[$categorieFourniture->getLibelle()][] = $equipement;
        }

        return $equipementGroupedByType;
    }
}
