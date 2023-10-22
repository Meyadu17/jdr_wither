<?php

namespace App\Entity\Stuff;

use App\Repository\Stuff\OutilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OutilRepository::class)]
#[ORM\Table(name: "outil_out")]
class Outil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "out_id")]
    private ?int $id = null;

    #[ORM\Column(name: "out_nom", length: 255)]
    private ?string $nom = null;

    #[ORM\Column(name: "out_effet", length: 255)]
    private ?string $effet = null;

    #[ORM\Column(name: "out_poids")]
    private ?float $poids = null;

    #[ORM\Column(name: "out_prix")]
    private ?int $prix = null;

    #[ORM\ManyToOne(targetEntity: Taille::class, inversedBy: 'armes')]
    #[ORM\JoinColumn(name: "out_id_tai_id", referencedColumnName: "tai_id")]
    private ?Taille $taille = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEffet(): ?string
    {
        return $this->effet;
    }

    public function setEffet(string $effet): static
    {
        $this->effet = $effet;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): static
    {
        $this->poids = $poids;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getTaille(): ?Taille
    {
        return $this->taille;
    }

    public function setTaille(?Taille $taille): static
    {
        $this->taille = $taille;

        return $this;
    }
}
