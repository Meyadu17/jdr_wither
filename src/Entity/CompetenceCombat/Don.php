<?php

namespace App\Entity\CompetenceCombat;

use App\Repository\CompetenceCombat\DonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonRepository::class)]
#[ORM\Table(name: "don_don")]
class Don
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "don_id")]
    private ?int $id = null;

    #[ORM\Column(name: "don_nom", length: 255)]
    private ?string $nom = null;

    #[ORM\Column(name: "don_pres_requis", length: 255, nullable: true)]
    private ?string $presRequis = null;

    #[ORM\Column(name: "don_initiative", nullable: true)]
    private ?int $initiative = null;

    #[ORM\Column(name: "don_effet", length: 255)]
    private ?string $effet = null;

    #[ORM\ManyToOne(targetEntity: TypeDon::class, inversedBy: 'dons')]
    #[ORM\JoinColumn(name: "don_fk_tdo_id", referencedColumnName: "tdo_id")]
    private ?TypeDon $type = null;

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

    public function getPresRequis(): ?string
    {
        return $this->presRequis;
    }

    public function setPresRequis(?string $presRequis): static
    {
        $this->presRequis = $presRequis;

        return $this;
    }

    public function getInitiative(): ?int
    {
        return $this->initiative;
    }

    public function setInitiative(?int $initiative): static
    {
        $this->initiative = $initiative;

        return $this;
    }

    public function getEffet(): ?string
    {
        return $this->effet;
    }

    public function setEffet(string $effet): static
    {
        $this->effet = $effet;

        return $this;
    }

    public function getType(): ?TypeDon
    {
        return $this->type;
    }

    public function setType(?TypeDon $type): static
    {
        $this->type = $type;

        return $this;
    }
}
