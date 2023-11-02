<?php

namespace App\Repository\Stuff;

use App\Entity\Stuff\CategorieArme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategorieArme>
 *
 * @method CategorieArme|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieArme|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieArme[]    findAll()
 * @method CategorieArme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieArmeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieArme::class);
    }
}
