<?php

namespace App\Entity\CompetenceCombat;

use App\Repository\CompetenceCombat\NiveauDonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NiveauDonRepository::class)]
#[ORM\Table(name: "niveau_signe_nsi")]
class NiveauSigne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "nsi_id")]
    private ?int $id = null;

    #[ORM\Column(name: "nsi_libelle", length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'niveauSigne', targetEntity: Signe::class)]
    private Collection $signes;

    public function __construct()
    {
        $this->signes = new ArrayCollection();
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
     * @return Collection<int, Signe>
     */
    public function getSignes(): Collection
    {
        return $this->signes;
    }

    public function addSigne(Signe $signe): static
    {
        if (!$this->signes->contains($signe)) {
            $this->signes->add($signe);
            $signe->setNiveauSigne($this);
        }

        return $this;
    }

    public function removeSigne(Signe $signe): static
    {
        if ($this->signes->removeElement($signe)) {
            // set the owning side to null (unless already changed)
            if ($signe->getNiveauSigne() === $this) {
                $signe->setNiveauSigne(null);
            }
        }

        return $this;
    }
}
