<?php

namespace App\Entity\CompetenceCombat;

use App\Repository\CompetenceCombat\TypeDonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeDonRepository::class)]
#[ORM\Table(name: "type_don_tdo")]
class TypeDon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "tdo_id")]
    private ?int $id = null;

    #[ORM\Column(name: "tdo_libelle", length: 255)]
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
