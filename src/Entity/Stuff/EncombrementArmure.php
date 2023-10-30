<?php

namespace App\Entity\Stuff;

use App\Repository\Stuff\EncombrementArmureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EncombrementArmureRepository::class)]
#[ORM\Table(name: "encombrement_armure_ear")]
class EncombrementArmure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ear_id")]
    private ?int $id = null;

    #[ORM\Column(name: "ear_libelle", length: 255)]
    private ?string $libelle = null;

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
}
