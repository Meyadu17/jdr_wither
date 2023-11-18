<?php

namespace App\Entity;

use App\Repository\TalentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'talent', targetEntity: TalentCaracteristique::class)]
    private Collection $talentCaracteristiques;

    #[ORM\OneToMany(mappedBy: 'talent', targetEntity: TalentJob::class)]
    private Collection $talentJobs;

    public function __construct()
    {
        $this->talentCaracteristiques = new ArrayCollection();
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

    /**
     * @return Collection<int, TalentCaracteristique>
     */
    public function getTalentCaracteristiques(): Collection
    {
        return $this->talentCaracteristiques;
    }

    public function addTalentCaracteristique(TalentCaracteristique $talentCaracteristique): static
    {
        if (!$this->talentCaracteristiques->contains($talentCaracteristique)) {
            $this->talentCaracteristiques->add($talentCaracteristique);
            $talentCaracteristique->setTalent($this);
        }

        return $this;
    }

    public function removeTalentCaracteristique(TalentCaracteristique $talentCaracteristique): static
    {
        if ($this->talentCaracteristiques->removeElement($talentCaracteristique)) {
            // set the owning side to null (unless already changed)
            if ($talentCaracteristique->getTalent() === $this) {
                $talentCaracteristique->setTalent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TalentJob>
     */
    public function getTalentJobs(): Collection
    {
        return $this->talentJobs;
    }

    public function addTalentJob(TalentJob $talentJob): static
    {
        if (!$this->talentJobs->contains($talentJob)) {
            $this->talentJobs->add($talentJob);
            $talentJob->setTalent($this);
        }

        return $this;
    }

    public function removeTalentJob(TalentJob $talentJob): static
    {
        if ($this->talentJobs->removeElement($talentJob)) {
            // set the owning side to null (unless already changed)
            if ($talentJob->getTalent() === $this) {
                $talentJob->setTalent(null);
            }
        }

        return $this;
    }
}
