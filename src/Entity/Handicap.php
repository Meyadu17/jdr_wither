<?php

namespace App\Entity;

use App\Repository\HandicapRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entité représentant les handicaps moraux et physique d'un personnage
 */
#[ORM\Entity(repositoryClass: HandicapRepository::class)]
#[ORM\Table(name: "handicap_han")]
class Handicap
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "han_id")]
    private ?int $id = null;

    /*
     * false : liste A
     * true : liste B
     */
    #[ORM\Column(name: "han_no_liste")]
    private ?bool $noListe = null;

    /*
     * false : Handicap physique
     * true : Handicap moral
     */
    #[ORM\Column(name: "han_libelle", length: 255)]
    private ?bool $libelle = null;

    #[ORM\Column(name: "han_descrition", type: "text")]
    private ?string $description = null;

    #[ORM\Column(name: "han_formation", length: 20, nullable: true)]
    private ?string $formation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isNoListe(): ?bool
    {
        return $this->noListe;
    }

    public function setNoListe(bool $noListe): static
    {
        $this->noListe = $noListe;

        return $this;
    }

    public function getLibelle(): ?bool
    {
        return $this->libelle;
    }

    public function setLibelle(bool $libelle): static
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

    public function getFormation(): ?string
    {
        return $this->formation;
    }

    public function setFormation(?string $formation): static
    {
        $this->formation = $formation;

        return $this;
    }
}
