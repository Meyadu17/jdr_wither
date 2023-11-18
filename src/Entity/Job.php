<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
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

    #[ORM\Column]
    private array $bonusCaracteristiques = [];

    #[ORM\Column]
    private array $bonusTalent = [];

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

    public function getBonusCaracteristiques(): array
    {
        return $this->bonusCaracteristiques;
    }

    public function setBonusCaracteristiques(array $bonusCaracteristiques): static
    {
        $this->bonusCaracteristiques = $bonusCaracteristiques;

        return $this;
    }

    public function getBonusTalent(): array
    {
        return $this->bonusTalent;
    }

    public function setBonusTalent(array $bonusTalent): static
    {
        $this->bonusTalent = $bonusTalent;

        return $this;
    }
}
