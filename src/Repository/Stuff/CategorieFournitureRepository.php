<?php

namespace App\Repository\Stuff;

use App\Entity\Stuff\CategorieFourniture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategorieFourniture>
 *
 * @method CategorieFourniture|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieFourniture|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieFourniture[]    findAll()
 * @method CategorieFourniture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieFournitureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieFourniture::class);
    }

}
