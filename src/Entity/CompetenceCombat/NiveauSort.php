<?php

namespace App\Entity\CompetenceCombat;

use App\Repository\CompetenceCombat\NiveauSortRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NiveauSortRepository::class)]
#[ORM\Table(name: "niveau_sor_nis")]
class NiveauSort
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "nis_id")]
    private ?int $id = null;

    #[ORM\Column(name: "nis_libelle", length: 255)]
    private ?string $libelle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }
}
