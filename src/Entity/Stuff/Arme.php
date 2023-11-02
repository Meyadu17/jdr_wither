<?php

namespace App\Entity\Stuff;

use App\Repository\Stuff\ArmeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entité définissant une arme
 */
#[ORM\Entity(repositoryClass: ArmeRepository::class)]
#[ORM\Table(name: "arme_arm")]
class Arme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "arm_id")]
    private ?int $id = null;

    #[ORM\Column(name: "arm_nom", length: 255)]
    private ?string $nom = null;

    #[ORM\Column(name: "arm_degat", length: 255, nullable: true)]
    private ?string $degat = null;

    #[ORM\Column(name: "arm_mains", nullable: true)]
    private ?int $mains = null;

    #[ORM\Column(name: "arm_portee", nullable: true)]
    private ?string $portee = null;

    #[ORM\Column(name: "arm_effet", length: 255, nullable: true)]
    private ?string $effet = null;

    #[ORM\Column(name: "arm_poids")]
    private ?float $poids = null;

    #[ORM\Column(name: "arm_prix", nullable: false)]
    private ?int $prix = null;

    #[ORM\ManyToOne(targetEntity: CategorieArme::class, inversedBy: 'armes')]
    #[ORM\JoinColumn(name: "arm_fk_car_id", referencedColumnName: "car_id", nullable: false)]
    private ?CategorieArme $categorieArme = null;

    #[ORM\ManyToOne(inversedBy: 'armes')]
    #[ORM\JoinColumn(name: "arm_fk_tai_id", referencedColumnName: "tai_id", nullable: false)]
    private ?Taille $taille = null;

    #[ORM\Column(name: "arm_description", type: "text")]
    private ?string $description = null;

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

    public function getDegat(): ?string
    {
        return $this->degat;
    }

    public function setDegat(?string $degat): static
    {
        $this->degat = $degat;

        return $this;
    }

    public function getMains(): ?int
    {
        return $this->mains;
    }

    public function setMains(?int $mains): static
    {
        $this->mains = $mains;

        return $this;
    }

    public function getPortee(): ?string
    {
        return $this->portee;
    }

    public function setPortee(?string $portee): static
    {
        $this->portee = $portee;

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

    public function getCategorieArme(): ?CategorieArme
    {
        return $this->categorieArme;
    }

    public function setCategorieArme(?CategorieArme $categorieArme): static
    {
        $this->categorieArme = $categorieArme;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
