<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JoueurRepository::class)]
class Joueur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbMax = null;

    #[ORM\Column(length: 255)]
    private ?string $poste = null;

    #[ORM\Column]
    private ?int $cout = null;

    #[ORM\Column]
    private ?int $compMvmt = null;

    #[ORM\Column]
    private ?int $compForce = null;

    #[ORM\Column(length: 255)]
    private ?string $compAgilite = null;

    #[ORM\Column(length: 255)]
    private ?string $compPasse = null;

    #[ORM\Column(length: 255)]
    private ?string $compArmure = null;

    #[ORM\Column(length: 255)]
    private ?string $principale = null;

    #[ORM\Column(length: 255)]
    private ?string $secondaire = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $comp = null;

    #[ORM\ManyToOne(inversedBy: 'joueurs')]
    private ?Race $Races = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbMax(): ?int
    {
        return $this->nbMax;
    }

    public function setNbMax(int $nbMax): static
    {
        $this->nbMax = $nbMax;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): static
    {
        $this->poste = $poste;

        return $this;
    }

    public function getCout(): ?int
    {
        return $this->cout;
    }

    public function setCout(int $cout): static
    {
        $this->cout = $cout;

        return $this;
    }

    public function getCompMvmt(): ?int
    {
        return $this->compMvmt;
    }

    public function setCompMvmt(int $compMvmt): static
    {
        $this->compMvmt = $compMvmt;

        return $this;
    }

    public function getCompForce(): ?int
    {
        return $this->compForce;
    }

    public function setCompForce(int $compForce): static
    {
        $this->compForce = $compForce;

        return $this;
    }

    public function getCompAgilite(): ?string
    {
        return $this->compAgilite;
    }

    public function setCompAgilite(string $compAgilite): static
    {
        $this->compAgilite = $compAgilite;

        return $this;
    }

    public function getCompPasse(): ?string
    {
        return $this->compPasse;
    }

    public function setCompPasse(string $compPasse): static
    {
        $this->compPasse = $compPasse;

        return $this;
    }

    public function getCompArmure(): ?string
    {
        return $this->compArmure;
    }

    public function setCompArmure(string $compArmure): static
    {
        $this->compArmure = $compArmure;

        return $this;
    }

    public function getPrincipale(): ?string
    {
        return $this->principale;
    }

    public function setPrincipale(string $principale): static
    {
        $this->principale = $principale;

        return $this;
    }

    public function getSecondaire(): ?string
    {
        return $this->secondaire;
    }

    public function setSecondaire(string $secondaire): static
    {
        $this->secondaire = $secondaire;

        return $this;
    }

    public function getComp(): ?string
    {
        return $this->comp;
    }

    public function setComp(string $comp): static
    {
        $this->comp = $comp;

        return $this;
    }

    public function getRaces(): ?Race
    {
        return $this->Races;
    }

    public function setRaces(?Race $Races): static
    {
        $this->Races = $Races;

        return $this;
    }
}
