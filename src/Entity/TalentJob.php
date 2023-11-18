<?php

namespace App\Entity;

use App\Repository\TalentJobRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TalentJobRepository::class)]
#[ORM\Table(name: "talent_job_tc")]

class TalentJob
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "tj_id")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Talent::class, inversedBy: 'talentJobs')]
    #[ORM\JoinColumn(name: "tj_kf_tal_id", referencedColumnName: "tal_id",nullable: false)]
    private ?Talent $talent = null;

    #[ORM\ManyToOne(targetEntity: Job::class, inversedBy: 'talentJobs')]
    #[ORM\JoinColumn(name: "tj_kf_job_id", referencedColumnName: "job_id",nullable: false)]
    private ?Job $job = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTalent(): ?Talent
    {
        return $this->talent;
    }

    public function setTalent(?Talent $talent): static
    {
        $this->talent = $talent;

        return $this;
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
}
