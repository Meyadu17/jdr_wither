<?php

namespace App\Entity\CompetenceCombat;

use App\Repository\CompetenceCombat\ElementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElementRepository::class)]
#[ORM\Table(name: "element_ele")]
class Element
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ele_id")]
    private ?int $id = null;

    #[ORM\Column(name: "ele_libelle", length: 255)]
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
