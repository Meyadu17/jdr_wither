<?php

namespace App\Entity;

use App\Repository\Stuff\EquipementGeneralRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementGeneralRepository::class)]
#[ORM\Table(name: "equipement_general_eqg")]
class EquipementGeneral
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "eqg_id")]
    private ?int $id = null;

    #[ORM\Column(name: "eqg_nom", length: 255)]
    private ?string $nom = null;

    #[ORM\Column(name: "eqg_poids")]
    private ?float $poids = null;

    #[ORM\Column(name: "eqg_prix")]
    private ?int $prix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): static
    {
        $this->poids = $poids;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }
}
