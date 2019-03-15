<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JeuRepository")
 */
class Jeu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *  
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
    private $developpeur;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     * min=3, max=255, minMessage="Le nom est trop court. Un minimum de {{ limit }} est requis", maxMessage="Le nom est trop long"
     * )
     */
    private $region;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Length(
     * min=4, max=4, minMessage="Merci d'entrer une année", maxMessage="Merci d'entrer une année"
     * )
     * @Assert\Type(
     *     type="integer",
     *     message="La valeur{{ value }} n'est pas valide."
     * )
     */
    private $anneeParution;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     * min=1, max=255, minMessage="Le nom est trop court. Un minimum de {{ limit }} est requis", maxMessage="Le nom est trop long"
     * )
     */
    private $etat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="integer",
     *     message="La valeur{{ value }} n'est pas valide."
     * )
     */
    private $nbJoueurMax;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategorieJeu", inversedBy="jeux")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $categorieJeu;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resultat", mappedBy="jeu")
     */
    private $resultats;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Console", inversedBy="jeux")
     * @Assert\NotBlank
     */
    private $consoles;

    public function __construct()
    {
        $this->resultats = new ArrayCollection();
        $this->consoles = new ArrayCollection();
    }

    public function getId(): ?int
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

    public function getDeveloppeur(): ?string
    {
        return $this->developpeur;
    }

    public function setDeveloppeur(string $developpeur): self
    {
        $this->developpeur = $developpeur;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getAnneeParution(): ?int
    {
        return $this->anneeParution;
    }

    public function setAnneeParution(int $anneeParution): self
    {
        $this->anneeParution = $anneeParution;

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

    public function getNbJoueurMax(): ?int
    {
        return $this->nbJoueurMax;
    }

    public function setNbJoueurMax(?int $nbJoueurMax): self
    {
        $this->nbJoueurMax = $nbJoueurMax;

        return $this;
    }

    public function getCategorieJeu(): ?CategorieJeu
    {
        return $this->categorieJeu;
    }

    public function setCategorieJeu(?CategorieJeu $categorieJeu): self
    {
        $this->categorieJeu = $categorieJeu;

        return $this;
    }

    /**
     * @return Collection|Resultat[]
     */
    public function getResultats(): Collection
    {
        return $this->resultats;
    }

    public function addResultat(Resultat $resultat): self
    {
        if (!$this->resultats->contains($resultat)) {
            $this->resultats[] = $resultat;
            $resultat->setJeu($this);
        }

        return $this;
    }

    public function removeResultat(Resultat $resultat): self
    {
        if ($this->resultats->contains($resultat)) {
            $this->resultats->removeElement($resultat);
            // set the owning side to null (unless already changed)
            if ($resultat->getJeu() === $this) {
                $resultat->setJeu(null);
            }
        }

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
    public function __toString(){
        // to show the name of the Jeu in the select
        return $this->nom;
        // to show the id of the Jeu in the select
        // return $this->id;
    }
}
