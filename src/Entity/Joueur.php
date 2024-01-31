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

    #[ORM\Column(length: 25)]
    private ?string $compPasse = null;

    #[ORM\Column(length: 25)]
    private ?string $compArmure = null;

    #[ORM\Column(length: 25)]
    private ?string $principale = null;

    #[ORM\Column(length: 25)]
    private ?string $secondaire = null;

    #[ORM\Column(length: 25)]
    private ?string $compAgilite = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $competencePerso = null;

    #[ORM\ManyToMany(targetEntity: Equipe::class, inversedBy: 'joueurs')]
    private Collection $equipes;

    #[ORM\OneToMany(mappedBy: 'joueurs', targetEntity: Race::class)]
    private Collection $races;

    public function __construct()
    {
        $this->equipes = new ArrayCollection();
        $this->races = new ArrayCollection();
    }

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

    public function getCompAgilite(): ?string
    {
        return $this->compAgilite;
    }

    public function setCompAgilite(string $compAgilite): static
    {
        $this->compAgilite = $compAgilite;

        return $this;
    }

    public function getCompetencePerso(): ?string
    {
        return $this->competencePerso;
    }

    public function setCompetencePerso(string $competencePerso): static
    {
        $this->competencePerso = $competencePerso;

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipes(): Collection
    {
        return $this->equipes;
    }

    public function addEquipe(Equipe $equipe): static
    {
        if (!$this->equipes->contains($equipe)) {
            $this->equipes->add($equipe);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): static
    {
        $this->equipes->removeElement($equipe);

        return $this;
    }

    /**
     * @return Collection<int, Race>
     */
    public function getRaces(): Collection
    {
        return $this->races;
    }

    public function addRace(Race $race): static
    {
        if (!$this->races->contains($race)) {
            $this->races->add($race);
            $race->setJoueurs($this);
        }

        return $this;
    }

    public function removeRace(Race $race): static
    {
        if ($this->races->removeElement($race)) {
            // set the owning side to null (unless already changed)
            if ($race->getJoueurs() === $this) {
                $race->setJoueurs(null);
            }
        }

        return $this;
    }
}
