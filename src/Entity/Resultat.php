<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResultatRepository")
 */
class Resultat
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
    private $mode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jeu", inversedBy="resultats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jeu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Joueur", inversedBy="resultats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $joueur;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Avatar", mappedBy="resultat", cascade={"persist", "remove"})
     */
    private $avatar;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(string $mode): self
    {
        $this->mode = $mode;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(string $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getJeu(): ?Jeu
    {
        return $this->jeu;
    }

    public function setJeu(?Jeu $jeu): self
    {
        $this->jeu = $jeu;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(?Joueur $joueur): self
    {
        $this->joueur = $joueur;

        return $this;
    }

    public function getAvatar(): ?Avatar
    {
        return $this->avatar;
    }

    public function setAvatar(Avatar $avatar): self
    {
        $this->avatar = $avatar;

        // set the owning side of the relation if necessary
        if ($this !== $avatar->getResultat()) {
            $avatar->setResultat($this);
        }

        return $this;
    }
    
    public function __toString(){
        // to show the name of the Category in the select
        return $this->score;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
