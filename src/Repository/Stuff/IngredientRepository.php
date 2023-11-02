<?php

namespace App\Repository\Stuff;

use App\Entity\Stuff\Ingredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<\App\Entity\Stuff\Ingredient>
 *
 * @method Ingredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ingredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ingredient[]    findAll()
 * @method Ingredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ingredient::class);
    }

    /**
     * Sélectionner les ingrédients par nom
     * @return float|int|mixed|string
     */
    public function findIngredientByName()
    {
        return $this->createQueryBuilder('i')
            ->orderBy('i.nom', 'ASC')
            ->getQuery()
            ->getResult();

    }

    /**
     * Filtrer les ingrédients en fonction du nom saisie
     * @param $nom
     * @return float|int|mixed|string
     */
    public function findIngredientFilteredByNom($nom)
    {
        return $this->createQueryBuilder('i')
            ->where('i.nom LIKE :nom')
            ->setParameter('nom', '%' . $nom . '%')
            ->orderBy('i.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
