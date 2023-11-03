<?php

namespace App\Entity\CompetenceCombat;

use App\Repository\CompetenceCombat\SigneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SigneRepository::class)]
#[ORM\Table(name: "signe_sig")]
class Signe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "sig_id")]
    private ?int $id = null;

    #[ORM\Column(name: "sig_nom", length: 255)]
    private ?string $nom = null;

    #[ORM\Column(name: "sig_description", type: "text")]
    private ?string $description = null;

    #[ORM\Column(name: "sig_cout", length: 255)]
    private ?string $cout = null;

    #[ORM\Column(name: "sig_portee")]
    private ?string $portee = null;

    #[ORM\Column(name: "sig_contre", length: 255, nullable: true)]
    private ?string $contre = null;

    #[ORM\Column(name: "sig_duree", length: 255)]
    private ?string $duree = null;

    #[ORM\ManyToOne(targetEntity: Element::class, inversedBy: 'signes')]
    #[ORM\JoinColumn(name: "sig_fk_ele_id", referencedColumnName: "ele_id")]
    private ?Element $element = null;

    #[ORM\ManyToOne(targetEntity: NiveauSigne::class, inversedBy: 'signes')]
    #[ORM\JoinColumn(name: "sig_fk_nsi_id", referencedColumnName: "nsi_id", nullable: false)]
    private ?NiveauSigne $niveauSigne = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    public function getPortee(): ?string
    {
        return $this->portee;
    }

    public function setPortee(string $portee): static
    {
        $this->portee = $portee;

        return $this;
    }

    public function getContre(): ?string
    {
        return $this->contre;
    }

    public function setContre(?string $contre): static
    {
        $this->contre = $contre;

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

    public function getElement(): ?Element
    {
        return $this->element;
    }

    public function setElement(?Element $element): static
    {
        $this->element = $element;

        return $this;
    }

    public function getNiveauSigne(): ?NiveauSigne
    {
        return $this->niveauSigne;
    }

    public function setNiveauSigne(?NiveauSigne $niveauSigne): static
    {
        $this->niveauSigne = $niveauSigne;

        return $this;
    }
}
