<?php

namespace App\Repository\Stuff;

use App\Entity\Stuff\Arme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<\App\Entity\Stuff\Arme>
 *
 * @method Arme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Arme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Arme[]    findAll()
 * @method Arme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArmeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Arme::class);
    }

    /**
     * @return Arme[] Retourne un tableau d'objet d'armes
     */
    public function findArmesGroupedByType()
    {
        $qb = $this->createQueryBuilder('a')
            ->join('a.categorieArme', 'c')
            ->orderBy('c.libelle', 'ASC')
            ->addOrderBy('a.nom', 'ASC') // Ajout du critère de tri par nom
            ->getQuery();

        $result = $qb->getResult();

        $armesGroupedByType = [];
        foreach ($result as $arme) {
            $categorie = $arme->getCategorieArme();
            $armesGroupedByType[$categorie->getLibelle()][] = $arme;
        }

        return $armesGroupedByType;
    }

    /**
     * @param string $nom Le nom de l'arme à filtrer
     * @return Arme[] Retourne un tableau d'objet d'armes filtré par nom
     */
    public function findArmesFilteredByNom($nom)
    {
        $qb = $this->createQueryBuilder('a')
            ->join('a.categorieArme', 'ta')
            ->where('a.nom LIKE :nom')
            ->setParameter('nom', '%' . $nom . '%')
            ->orderBy('ta.id', 'ASC')
            ->getQuery();

        $result = $qb->getResult();

        $armesGroupedByType = [];
        foreach ($result as $arme) {
            $categorie = $arme->getCategorieArme();
            $armesGroupedByType[$categorie->getLibelle()][] = $arme;
        }

        return $armesGroupedByType;
    }
}
