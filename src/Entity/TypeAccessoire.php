<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeAccessoireRepository")
 */
class TypeAccessoire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomAccessoire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $capacite;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Accessoire", mappedBy="typeAccessoire")
     */
    private $accessoires;

    public function __construct()
    {
        $this->accessoires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAccessoire(): ?string
    {
        return $this->nomAccessoire;
    }

    public function setNomAccessoire(string $nomAccessoire): self
    {
        $this->nomAccessoire = $nomAccessoire;

        return $this;
    }

    public function getCapacite(): ?string
    {
        return $this->capacite;
    }

    public function setCapacite(?string $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    /**
     * @return Collection|Accessoire[]
     */
    public function getAccessoires(): Collection
    {
        return $this->accessoires;
    }

    public function addAccessoire(Accessoire $accessoire): self
    {
        if (!$this->accessoires->contains($accessoire)) {
            $this->accessoires[] = $accessoire;
            $accessoire->setTypeAccessoire($this);
        }

        return $this;
    }

    public function removeAccessoire(Accessoire $accessoire): self
    {
        if ($this->accessoires->contains($accessoire)) {
            $this->accessoires->removeElement($accessoire);
            // set the owning side to null (unless already changed)
            if ($accessoire->getTypeAccessoire() === $this) {
                $accessoire->setTypeAccessoire(null);
            }
        }

        return $this;
    }
    
    public function __toString(){
        // to show the name of the Category in the select
        return $this->nomAccessoire;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
