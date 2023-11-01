<?php

namespace App\Entity\Stuff;

use App\Repository\Stuff\EmplacementArmureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmplacementArmureRepository::class)]
#[ORM\Table(name: "emplacement_armure_tar")]
class EmplacementArmure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "tar_id")]
    private ?int $id = null;

    #[ORM\Column(name: "tar_libelle", length: 255)]
    private ?string $libelle = null;

//    #[ORM\OneToMany(mappedBy: 'typeArmure', targetEntity: Armure::class)]
//    private Collection $armures;

    public function __construct()
    {
        $this->armures = new ArrayCollection();
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
     * @return Collection<int, Armure>
     */
    public function getArmures(): Collection
    {
        return $this->armures;
    }

//    public function addArmure(Armure $armure): static
//    {
//        if (!$this->armures->contains($armure)) {
//            $this->armures->add($armure);
//            $armure->setTypeArmure($this);
//        }
//
//        return $this;
//    }
//
//    public function removeArmure(Armure $armure): static
//    {
//        if ($this->armures->removeElement($armure)) {
//            // set the owning side to null (unless already changed)
//            if ($armure->getTypeArmure() === $this) {
//                $armure->setTypeArmure(null);
//            }
//        }
//
//        return $this;
//    }
}
