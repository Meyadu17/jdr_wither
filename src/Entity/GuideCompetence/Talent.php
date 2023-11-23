<?php

namespace App\Entity\GuideCompetence;

use App\Repository\GuideCompetence\TalentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entité représentant les caractéristiques d'un personnage
 * (Acrobatie, artisanat, etc...)
 */
#[ORM\Entity(repositoryClass: TalentRepository::class)]
#[ORM\Table(name: "talent_tal")]
class Talent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "tal_id")]
    private ?int $id = null;

    #[ORM\Column(name: "tal_libelle", length: 20)]
    private ?string $libelle = null;

    #[ORM\Column(name: "tal_description", length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne(targetEntity: Caracteristique::class, inversedBy: 'talent')]
    #[ORM\JoinColumn(name: "tal_fk_cap_id", referencedColumnName: "cap_id", nullable: false)]
    private ?Caracteristique $caracteristique = null;

    public function __construct()
    {
        $this->talentJobs = new ArrayCollection();
    }


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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCaracteristique(): ?Caracteristique
    {
        return $this->caracteristique;
    }

    public function setCaracteristique(?Caracteristique $caracteristique): static
    {
        $this->caracteristique = $caracteristique;

        return $this;
    }
}
