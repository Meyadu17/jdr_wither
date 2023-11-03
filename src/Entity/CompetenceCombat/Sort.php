<?php

namespace App\Entity\CompetenceCombat;

use App\Repository\CompetenceCombat\SortRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SortRepository::class)]
#[ORM\Table(name: "sort_sor")]
class Sort
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "sor_id")]
    private ?int $id = null;

    #[ORM\Column(name: "sor_nom", length: 255)]
    private ?string $nom = null;

    #[ORM\Column(name: "sor_cout")]
    private ?string $cout = null;

    #[ORM\Column(name: "sor_effet", type: "text")]
    private ?string $effet = null;

    #[ORM\Column(name: "sor_portee")]
    private ?string $portee = null;

    #[ORM\Column(name: "sor_duree", length: 255)]
    private ?string $duree = null;

    #[ORM\Column(name: "sor_contre", length: 255)]
    private ?string $contre = null;

    #[ORM\ManyToOne(targetEntity: Element::class, inversedBy: 'sorts')]
    #[ORM\JoinColumn(name: "sor_fk_ele_id", referencedColumnName: "ele_id")]
    private ?Element $element = null;

    #[ORM\ManyToOne(targetEntity: NiveauSort::class, inversedBy: 'sorts')]
    #[ORM\JoinColumn(name: "sor_fk_nso_id", referencedColumnName: "nso_id")]
    private ?NiveauSort $niveauSort = null;

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

    public function getCout(): ?string
    {
        return $this->cout;
    }

    public function setCout(string $cout): static
    {
        $this->cout = $cout;

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

    public function getPortee(): ?string
    {
        return $this->portee;
    }

    public function setPortee(string $portee): static
    {
        $this->portee = $portee;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getContre(): ?string
    {
        return $this->contre;
    }

    public function setContre(string $contre): static
    {
        $this->contre = $contre;

        return $this;
    }

    public function getElement(): ?Element
    {
        return $this->element;
    }

    public function setElement(?Element $element): static
    {
        $this->element = $element;

        return $this;
    }

    public function getNiveauSort(): ?NiveauSort
    {
        return $this->niveauSort;
    }

    public function setNiveauSort(?NiveauSort $niveauSort): static
    {
        $this->niveauSort = $niveauSort;

        return $this;
    }
}
