<?php

namespace App\Entity\Stuff;

use App\Repository\Stuff\ArmureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entité définissant une armure, une protection
 */
#[ORM\Entity(repositoryClass: ArmureRepository::class)]
#[ORM\Table(name: "armure_apr")]
class Armure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "apr_id")]
    private ?int $id = null;

    #[ORM\Column(name: "apr_nom", length: 255)]
    private ?string $nom = null;

    #[ORM\Column(name: "apr_protection", nullable: true)]
    private ?int $protection = null;

    #[ORM\Column(name: "apr_effet", length: 255, nullable: true)]
    private ?string $effet = null;

    #[ORM\Column(name: "apr_poids", length: 255)]
    private ?float $poids = null;

    #[ORM\Column(name: "apr_prix", length: 255)]
    private ?int $prix = null;

    #[ORM\ManyToOne(targetEntity: EmplacementArmure::class, inversedBy: 'armures')]
    #[ORM\JoinColumn(name: "apr_fk_tar_id", referencedColumnName: "tar_id", nullable: false)]
    private ?EmplacementArmure $emplacementArmure = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "apr_fk_ear_id", referencedColumnName: "ear_id",nullable: false)]
    private ?EncombrementArmure $encombrementArmure = null;

    #[ORM\Column(name: "apr_description", type: "text")]
    private ?string $description = null;

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

    public function getProtection(): ?int
    {
        return $this->protection;
    }

    public function setProtection(int $protection): static
    {
        $this->protection = $protection;

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

    public function getEmplacementArmure(): ?EmplacementArmure
    {
        return $this->emplacementArmure;
    }

    public function setEmplacementArmure(?EmplacementArmure $emplacementArmure): static
    {
        $this->emplacementArmure = $emplacementArmure;

        return $this;
    }

    public function getEncombrementArmure(): ?EncombrementArmure
    {
        return $this->encombrementArmure;
    }

    public function setEncombrementArmure(?EncombrementArmure $encombrementArmure): static
    {
        $this->encombrementArmure = $encombrementArmure;

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
}
