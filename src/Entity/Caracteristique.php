<?php

namespace App\Entity;

use App\Repository\CaracteristiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entité représentant les caractéristiques d'un personnage
 * (Force, habileté, charme, sagacité)
 */
#[ORM\Entity(repositoryClass: CaracteristiqueRepository::class)]
#[ORM\Table(name: "caracteristique_cap")]
class Caracteristique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "cap_id")]
    private ?int $id = null;

    #[ORM\Column(name: "cap_libelle", length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'caracteristique', targetEntity: Talent::class)]
    private Collection $talent;

    #[ORM\OneToMany(mappedBy: 'caracteristique', targetEntity: JobCaracteristique::class)]
    private Collection $jobCaracteristiques;

    #[ORM\OneToMany(mappedBy: 'caracteristique', targetEntity: TalentCaracteristique::class)]
    private Collection $talentCaracteristiques;


    public function __construct()
    {
        $this->talent = new ArrayCollection();
        $this->jobCaracteristiques = new ArrayCollection();
        $this->talentCaracteristiques = new ArrayCollection();
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

    /**
     * @return Collection<int, Talent>
     */
    public function getTalent(): Collection
    {
        return $this->talent;
    }

    public function addTalent(Talent $talent): static
    {
        if (!$this->talent->contains($talent)) {
            $this->talent->add($talent);
            $talent->setCaracteristique($this);
        }

        return $this;
    }

    public function removeTalent(Talent $talent): static
    {
        if ($this->talent->removeElement($talent)) {
            // set the owning side to null (unless already changed)
            if ($talent->getCaracteristique() === $this) {
                $talent->setCaracteristique(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, JobCaracteristique>
     */
    public function getJobCaracteristiques(): Collection
    {
        return $this->jobCaracteristiques;
    }

    public function addJobCaracteristique(JobCaracteristique $jobCaracteristique): static
    {
        if (!$this->jobCaracteristiques->contains($jobCaracteristique)) {
            $this->jobCaracteristiques->add($jobCaracteristique);
            $jobCaracteristique->setCaracteristique($this);
        }

        return $this;
    }

    public function removeJobCaracteristique(JobCaracteristique $jobCaracteristique): static
    {
        if ($this->jobCaracteristiques->removeElement($jobCaracteristique)) {
            // set the owning side to null (unless already changed)
            if ($jobCaracteristique->getCaracteristique() === $this) {
                $jobCaracteristique->setCaracteristique(null);
            }
        }

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
            $talentCaracteristique->setCaracteristique($this);
        }

        return $this;
    }

    public function removeTalentCaracteristique(TalentCaracteristique $talentCaracteristique): static
    {
        if ($this->talentCaracteristiques->removeElement($talentCaracteristique)) {
            // set the owning side to null (unless already changed)
            if ($talentCaracteristique->getCaracteristique() === $this) {
                $talentCaracteristique->setCaracteristique(null);
            }
        }

        return $this;
    }
}
