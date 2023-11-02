<?php

namespace App\Entity\Stuff;

use App\Repository\Stuff\TailleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entité définissant la taille d'une arme
 */
#[ORM\Entity(repositoryClass: TailleRepository::class)]
#[ORM\Table(name: "taille_tai")]
class Taille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "tai_id")]
    private ?int $id = null;

    #[ORM\Column(name: "tai_libelle", length: 255)]
    private ?string $libelle = null;

//    #[ORM\OneToMany(mappedBy: 'taille', targetEntity: Arme::class)]
//    private Collection $armes;

    public function __construct()
    {
        $this->armes = new ArrayCollection();
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
     * @return Collection<int, Arme>
     */
    public function getArmes(): Collection
    {
        return $this->armes;
    }

    public function addArme(Arme $arme): static
    {
        if (!$this->armes->contains($arme)) {
            $this->armes->add($arme);
            $arme->setTaille($this);
        }

        return $this;
    }

    public function removeArme(Arme $arme): static
    {
        if ($this->armes->removeElement($arme)) {
            // set the owning side to null (unless already changed)
            if ($arme->getTaille() === $this) {
                $arme->setTaille(null);
            }
        }

        return $this;
    }
}
