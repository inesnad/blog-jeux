<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConsoleRepository")
 */
class Console
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
    private $nomConsole;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank
     * @Assert\Length(
     * min=1, max=255, minMessage="Le nom est trop court. Un minimum de {{ limit }} est requis", maxMessage="Le nom est trop long"
     * )
     */
     
    private $sortieAv;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     * min=1, max=255, minMessage="Le nom est trop court. Un minimum de {{ limit }} est requis", maxMessage="Le nom est trop long"
     * )
     */
     
    private $etat;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Jeu", mappedBy="consoles")
     */
    private $jeux;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Accessoire", mappedBy="consoles")
     */
    private $accessoires;

    public function __construct()
    {
        $this->jeux = new ArrayCollection();
        $this->accessoires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomConsole(): ?string
    {
        return $this->nomConsole;
    }

    public function setNomConsole(string $nomConsole): self
    {
        $this->nomConsole = $nomConsole;

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

    public function getSortieAv(): ?string
    {
        return $this->sortieAv;
    }

    public function setSortieAv(?string $sortieAv): self
    {
        $this->sortieAv = $sortieAv;

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

    /**
     * @return Collection|Jeu[]
     */
    public function getJeux(): Collection
    {
        return $this->jeux;
    }

    public function addJeux(Jeu $jeux): self
    {
        if (!$this->jeux->contains($jeux)) {
            $this->jeux[] = $jeux;
        }

        return $this;
    }

    public function removeJeux(Jeu $jeux): self
    {
        if ($this->jeux->contains($jeux)) {
            $this->jeux->removeElement($jeux);
        }

        return $this;
    }
    
    /**
     * @return Collection|Accessoire[]
     */
    public function getAccessoires(): Collection
    {
        return $this->accessoires;
    }
    
    public function addAccessoires(Accessoire $accessoires): self
    {
        if (!$this->accessoires->contains($accessoires)) {
            $this->accessoires[] = $accessoires;
        }
        
        return $this;
    }
    
    public function removeAccessoires(Accessoire $accessoires): self
    {
        if ($this->accessoires->contains($accessoires)) {
            $this->accessoires->removeElement($accessoires);
        }
        
        return $this;
    }
    public function __toString(){
        // to show the name of the Category in the select
        return $this->nomConsole;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
