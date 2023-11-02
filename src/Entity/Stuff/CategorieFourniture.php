<?php

namespace App\Entity\Stuff;

use App\Repository\Stuff\CategorieFournitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entité définissant un type de fourniture
 */
#[ORM\Entity(repositoryClass: CategorieFournitureRepository::class)]
#[ORM\Table(name: "categorie_fourniture_caf")]
class CategorieFourniture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "caf_id")]
    private ?int $id = null;

    #[ORM\Column(name: "caf_libelle", length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'categorieFourniture', targetEntity: EquipementGeneral::class)]
    private Collection $equipementGenerals;

    public function __construct()
    {
        $this->equipementGenerals = new ArrayCollection();
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
     * @return Collection<int, EquipementGeneral>
     */
    public function getEquipementGenerals(): Collection
    {
        return $this->equipementGenerals;
    }

    public function addEquipementGeneral(EquipementGeneral $equipementGeneral): static
    {
        if (!$this->equipementGenerals->contains($equipementGeneral)) {
            $this->equipementGenerals->add($equipementGeneral);
            $equipementGeneral->setFourniture($this);
        }

        return $this;
    }

    public function removeEquipementGeneral(EquipementGeneral $equipementGeneral): static
    {
        if ($this->equipementGenerals->removeElement($equipementGeneral)) {
            // set the owning side to null (unless already changed)
            if ($equipementGeneral->getFourniture() === $this) {
                $equipementGeneral->setFourniture(null);
            }
        }

        return $this;
    }
}
