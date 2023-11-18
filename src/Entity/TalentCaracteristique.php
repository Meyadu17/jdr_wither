<?php

namespace App\Entity;

use App\Repository\TalentCaracteristiqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TalentCaracteristiqueRepository::class)]
#[ORM\Table(name: "talent_caracteristique_tc")]
class TalentCaracteristique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "tc_id")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Talent::class, inversedBy: 'talentCaracteristiques')]
    #[ORM\JoinColumn(name: "tc_kf_tal_id", referencedColumnName: "tal_id",nullable: false)]
    private ?Talent $talent = null;

    #[ORM\ManyToOne(targetEntity:  Caracteristique::class, inversedBy: 'talentCaracteristiques')]
    #[ORM\JoinColumn(name: "tc_kf_cap_id", referencedColumnName: "cap_id",nullable: false)]
    private ?Caracteristique $caracteristique = null;

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
