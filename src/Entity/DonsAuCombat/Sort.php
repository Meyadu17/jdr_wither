<?php

namespace App\Entity\DonsAuCombat;

use App\Repository\DonsAuCombat\SortRepository;
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

    #[ORM\ManyToOne]
    #[ORM\Column(name: "sor_niveau", nullable: false)]
    private ?NiveauSort $niveau = null;

    #[ORM\ManyToOne]
    #[ORM\Column(name: "sor_element", nullable: false)]
    private ?Element $element = null;

    #[ORM\Column(name: "sor_cout")]
    private ?int $cout = null;

    #[ORM\Column(name: "sor_effet", length: 255)]
    private ?string $effet = null;

    #[ORM\Column(name: "sor_portee")]
    private ?int $portee = null;

    #[ORM\Column(name: "sor_duree", length: 255)]
    private ?string $duree = null;

    #[ORM\Column(name: "sor_contre", length: 255)]
    private ?string $contre = null;

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

    public function getNiveau(): ?NiveauSort
    {
        return $this->niveau;
    }

    public function setNiveau(?NiveauSort $niveau): static
    {
        $this->niveau = $niveau;

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

    public function getCout(): ?int
    {
        return $this->cout;
    }

    public function setCout(int $cout): static
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

    public function getPortee(): ?int
    {
        return $this->portee;
    }

    public function setPortee(int $portee): static
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
}
