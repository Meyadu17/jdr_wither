<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entité représentant le job d'un personnage
 */
#[ORM\Entity(repositoryClass: JobRepository::class)]
#[ORM\Table(name: "job_job")]
class Job
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "job_id")]
    private ?int $id = null;

    #[ORM\Column(name: "job_libelle", length: 50)]
    private ?string $libelle = null;

    #[ORM\Column(name: "job_presrequis", length: 15)]
    private ?string $presrequis = null;

    #[ORM\OneToMany(mappedBy: 'job', targetEntity: JobCaracteristique::class, orphanRemoval: true)]
    private Collection $jobCaracteristiques;

    #[ORM\OneToMany(mappedBy: 'job', targetEntity: TalentJob::class)]
    private Collection $talentJobs;

    public function __construct()
    {
        $this->jobCaracteristiques = new ArrayCollection();
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

    public function getPresrequis(): ?string
    {
        return $this->presrequis;
    }

    public function setPresrequis(string $presrequis): static
    {
        $this->presrequis = $presrequis;

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
            $jobCaracteristique->setJob($this);
        }

        return $this;
    }

    public function removeJobCaracteristique(JobCaracteristique $jobCaracteristique): static
    {
        if ($this->jobCaracteristiques->removeElement($jobCaracteristique)) {
            // set the owning side to null (unless already changed)
            if ($jobCaracteristique->getJob() === $this) {
                $jobCaracteristique->setJob(null);
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
            $talentJob->setJob($this);
        }

        return $this;
    }

    public function removeTalentJob(TalentJob $talentJob): static
    {
        if ($this->talentJobs->removeElement($talentJob)) {
            // set the owning side to null (unless already changed)
            if ($talentJob->getJob() === $this) {
                $talentJob->setJob(null);
            }
        }

        return $this;
    }
}
