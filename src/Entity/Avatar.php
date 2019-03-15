<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvatarRepository")
 */
class Avatar
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
    private $typeAvatar;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Resultat", inversedBy="avatar", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $resultat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeAvatar(): ?string
    {
        return $this->typeAvatar;
    }

    public function setTypeAvatar(string $typeAvatar): self
    {
        $this->typeAvatar = $typeAvatar;

        return $this;
    }

    public function getResultat(): ?Resultat
    {
        return $this->resultat;
    }

    public function setResultat(Resultat $resultat): self
    {
        $this->resultat = $resultat;

        return $this;
    }
    public function __toString(){
        // to show the name of the Category in the select
        return $this->typeAvatar;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
