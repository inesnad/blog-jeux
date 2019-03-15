<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\AccessoireRepository")
 */
class Accessoire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     * min=3, max=255, minMessage="Le nom est trop court. Un minimum de {{ limit }} est requis", maxMessage="Le nom est trop long"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     * min=3, max=255, minMessage="Le nom est trop court. Un minimum de {{ limit }} est requis", maxMessage="Le nom est trop long"
     * )
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     * min=3, max=255, minMessage="Le nom est trop court. Un minimum de {{ limit }} est requis", maxMessage="Le nom est trop long"
     * )
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     * min=1, max=255, minMessage="Le nom est trop court. Un minimum de {{ limit }} est requis", maxMessage="Le nom est trop long"
     * )
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeAccessoire", inversedBy="accessoires")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $typeAccessoire;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Console", inversedBy="accessoires")
     * @Assert\NotBlank
     */
    private $consoles;
    
    public function __construct()
    {       
        $this->consoles = new ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getTypeAccessoire(): ?TypeAccessoire
    {
        return $this->typeAccessoire;
    }

    public function setTypeAccessoire(?TypeAccessoire $typeAccessoire): self
    {
        $this->typeAccessoire = $typeAccessoire;

        return $this;
    }
    
    /**
     * @return Collection|Console[]
     */
    public function getConsoles(): Collection
    {
        return $this->consoles;
    }
    
    public function addConsole(Console $console): self
    {
        if (!$this->consoles->contains($console)) {
            $this->consoles[] = $console;
            $console->addJeux($this);
        }
        
        return $this;
    }
    
    public function removeConsole(Console $console): self
    {
        if ($this->consoles->contains($console)) {
            $this->consoles->removeElement($console);
            $console->removeJeux($this);
        }
        
        return $this;
    }
}
