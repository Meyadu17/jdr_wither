<?php

namespace App\Entity\DonsAuCombat;

use App\Repository\DonsAuCombat\SigneRepository;
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

    #[ORM\Column(name: "signiveau_", length: 255)]
    private ?string $niveau = null;

    #[ORM\ManyToOne]
    #[ORM\Column(name: "sig_element", nullable: false)]
    private ?Element $element = null;

    #[ORM\Column(name: "sig_description", length: 255)]
    private ?string $description = null;

    #[ORM\Column(name: "sig_cout", length: 255)]
    private ?string $cout = null;

    #[ORM\Column(name: "sig_portee")]
    private ?int $portee = null;

    #[ORM\Column(name: "sig_contre", length: 255, nullable: true)]
    private ?string $contre = null;

    #[ORM\Column(name: "sig_duree", length: 255)]
    private ?string $duree = null;

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

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): static
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

    public function getPortee(): ?int
    {
        return $this->portee;
    }

    public function setPortee(int $portee): static
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
}
