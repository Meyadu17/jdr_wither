<?php

namespace App\Repository\Stuff;

use App\Entity\Stuff\Armure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Armure>
 *
 * @method Armure|null find($id, $lockMode = null, $lockVersion = null)
 * @method Armure|null findOneBy(array $criteria, array $orderBy = null)
 * @method Armure[]    findAll()
 * @method Armure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArmureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Armure::class);
    }

    /**
     * @return Armure[] Retourne un tableau d'objet d'armures
     */
    public function findArmuresGroupedByType()
    {
        $qb = $this->createQueryBuilder('a')
            ->join('a.emplacementArmure', 'e')
            ->orderBy('e.libelle', 'ASC')
            ->addOrderBy('a.nom', 'ASC') // Ajout du critère de tri par nom
            ->getQuery();

        $result = $qb->getResult();

        $armuresGroupedByType = [];
        foreach ($result as $armure) {
            $emplacement = $armure->getEmplacementArmure();
            $armuresGroupedByType[$emplacement->getLibelle()][] = $armure;
        }

        return $armuresGroupedByType;
    }

    /**
     * @param string $nom Le nom de l'armure à filtrer
     * @return Armure[] Retourne un tableau d'objet d'armures filtré par nom
     */
    public function findArmuresFilteredByNom($nom)
    {
        $qb = $this->createQueryBuilder('a')
            ->join('a.type', 'ta')
            ->where('a.nom LIKE :nom')
            ->setParameter('nom', '%' . $nom . '%')
            ->orderBy('ta.id', 'ASC')
            ->getQuery();

        $result = $qb->getResult();

        $armuresGroupedByType = [];
        foreach ($result as $armure) {
            $emplacement = $armure->getEmplacementArmure();
            $armuresGroupedByType[$emplacement->getLibelle()][] = $emplacement;
        }

        return $armuresGroupedByType;
    }
}
