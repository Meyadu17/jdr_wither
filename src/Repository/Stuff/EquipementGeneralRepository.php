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

    public function findEquipementByName()
    {
        return $this->createQueryBuilder('eg')
            ->orderBy('eg.nom', 'ASC')
            ->getQuery()
            ->getResult();

    }

    public function findEquipementFilteredByNom($nom)
    {
        return $this->createQueryBuilder('eg')
            ->where('eg.nom LIKE :nom')
            ->setParameter('nom', '%' . $nom . '%')
            ->orderBy('eg.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
