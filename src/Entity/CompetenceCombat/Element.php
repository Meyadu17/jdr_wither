<?php

namespace App\Entity\CompetenceCombat;

use App\Repository\CompetenceCombat\ElementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElementRepository::class)]
#[ORM\Table(name: "element_ele")]
class Element
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "ele_id")]
    private ?int $id = null;

    #[ORM\Column(name: "ele_libelle", length: 255)]
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
            $signe->setElement($this);
        }

        return $this;
    }

    public function removeSigne(Signe $signe): static
    {
        if ($this->signes->removeElement($signe)) {
            // set the owning side to null (unless already changed)
            if ($signe->getElement() === $this) {
                $signe->setElement(null);
            }
        }

        return $this;
    }
}
