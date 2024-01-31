<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RaceRepository::class)]
class Race
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $relance = null;

    #[ORM\Column(length: 255)]
    private ?string $apothicaire = null;

    #[ORM\Column]
    private ?int $tresorerie = null;

    #[ORM\Column]
    private ?int $cheerleader = null;

    #[ORM\Column]
    private ?int $assistant = null;

    #[ORM\ManyToOne(inversedBy: 'races')]
    private ?Equipe $equipes = null;

    #[ORM\ManyToOne(inversedBy: 'races')]
    private ?Joueur $joueurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRelance(): ?int
    {
        return $this->relance;
    }

    public function setRelance(int $relance): static
    {
        $this->relance = $relance;

        return $this;
    }

    public function getApothicaire(): ?string
    {
        return $this->apothicaire;
    }

    public function setApothicaire(string $apothicaire): static
    {
        $this->apothicaire = $apothicaire;

        return $this;
    }

    public function getTresorerie(): ?int
    {
        return $this->tresorerie;
    }

    public function setTresorerie(int $tresorerie): static
    {
        $this->tresorerie = $tresorerie;

        return $this;
    }

    public function getCheerleader(): ?int
    {
        return $this->cheerleader;
    }

    public function setCheerleader(int $cheerleader): static
    {
        $this->cheerleader = $cheerleader;

        return $this;
    }

    public function getAssistant(): ?int
    {
        return $this->assistant;
    }

    public function setAssistant(int $assistant): static
    {
        $this->assistant = $assistant;

        return $this;
    }

    public function getEquipes(): ?Equipe
    {
        return $this->equipes;
    }

    public function setEquipes(?Equipe $equipes): static
    {
        $this->equipes = $equipes;

        return $this;
    }

    public function getJoueurs(): ?Joueur
    {
        return $this->joueurs;
    }

    public function setJoueurs(?Joueur $joueurs): static
    {
        $this->joueurs = $joueurs;

        return $this;
    }
}