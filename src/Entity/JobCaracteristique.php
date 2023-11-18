<?php

namespace App\Entity;

use App\Repository\JobCaracteristiqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobCaracteristiqueRepository::class)]
#[ORM\Table(name: "job_caracteristique_jc")]
class JobCaracteristique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "jc_id")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Job::class ,inversedBy: 'jobCaracteristiques')]
    #[ORM\JoinColumn(name: "jc_kf_job_id", referencedColumnName: "job_id",nullable: false)]
    private ?Job $job = null;

    #[ORM\ManyToOne(targetEntity:  Caracteristique::class, inversedBy: 'jobCaracteristiques')]
    #[ORM\JoinColumn(name: "jc_kf_cap_id", referencedColumnName: "cap_id",nullable: false)]
    private ?Caracteristique $caracteristique = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJob(): ?Job
    {
        return $this->job;
    }

    public function setJob(?Job $job): static
    {
        $this->job = $job;

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
