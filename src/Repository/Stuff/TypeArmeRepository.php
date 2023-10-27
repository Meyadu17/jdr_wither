<?php

namespace App\Repository\Stuff;

use App\Entity\Stuff\TypeArme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeArme>
 *
 * @method TypeArme|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeArme|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeArme[]    findAll()
 * @method TypeArme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeArmeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeArme::class);
    }

}
